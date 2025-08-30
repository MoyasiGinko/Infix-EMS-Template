<?php

namespace Modules\MenuManage\Http\Controllers;

use Exception;
use App\GlobalVariable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\SidebarDataStore;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Modules\MenuManage\Entities\SmMenu;
use Modules\MenuManage\Entities\Sidebar;
use Modules\RolePermission\Entities\InfixRole;
use Modules\RolePermission\Entities\Permission;
use Modules\MenuManage\Http\Requests\SectionRequestFrom;

class SidebarManagerController extends Controller
{
    use SidebarDataStore;

    public function __construct() {}    public static function unUsedMenu($role_id = null)
    {
        // Simplified logic: Get ALL unused menu items for the role
        // This directly returns all sidebar entries with active_status = 0 (unused)
        // and ensures proper permissions are applied

        $unusedSidebars = Sidebar::leftJoin('permissions', 'sidebars.permission_id', '=', 'permissions.id')
            ->where('sidebars.role_id', $role_id)
            ->whereNull('sidebars.user_id')
            ->where('sidebars.active_status', 0) // Unused items
            ->where('sidebars.ignore', 0) // Not ignored
            ->where('permissions.status', 1) // Permission is active
            ->where('permissions.menu_status', 1) // Permission allows menu display
            ->select(
                'sidebars.*',
                'permissions.name',
                'permissions.route',
                'permissions.lang_name',
                'permissions.module',
                'permissions.icon'
            )
            ->orderBy('sidebars.position')
            ->get();

        return $unusedSidebars;
    }

    public function sectionStore(Request $request)
    {

        $role_id = $this->getRoleId($request->role_name);
        if (config('app.app_sync')) {
            Toastr::error('Restricted in demo mode');
            return back();
        }
        $request->validate([
            'name' => ['required', Rule::unique('permissions', 'name')->where('id', $role_id)],
        ]);

        $permission_position = SmMenu::where('permission_section',1)->where('role_id',$role_id)->orderBy('position','DESC')->first();
        $position = ($permission_position ? $permission_position->position : 0) + 1;
        $role_slug = str_replace('-','_',Str::slug(mb_strtolower($request->name)));
        SmMenu::create([
            "name" => $request->name,
            "route" => $role_slug,
            "lang_name" => $request->name,
            "is_saas" => 1,
            "role_id" => $role_id,
            "is_alumni" => null,
            "position" => $position,
            "school_id" => getSchool()->id,
            'menu_status' => 1,
            'permission_section' => 1
        ]);
        Toastr::success('Operation successful', 'Success');
        return redirect()->route('menumanage.index', ['role_name' => $request->role_name]);
    }

    public function sectionEditForm(Request $request, $id)
    {
        if (config('app.app_sync')) {
            Toastr::error('Restricted in demo mode');
            return back();
        }
        if(!empty($request->role_name))
        {
            $role_name = $request->role_name;
        }else{
            if(Auth::user()->role_id == 2)
            {
                $role_name = 'student';
            }elseif(Auth::user()->role_id == 3){
                $role_name = 'parent';
            }else{
                $role_name = 'staff';
            }
        }

        $data = [];
        $role_id = $request->role_id;
        $data['editPermissionSection'] = SmMenu::where('id',$id)->first();
        // Use unified data builder to ensure merged unused menu list (sm_menus + sidebars)
        $menusData = $this->getMenusData($role_name);
        $data['unused_menus'] = $menusData['unused_menus'];
        $data['sidebar_menus'] = $menusData['sidebar_menus'];
        Cache::forget(sidebar_cache_key($role_id));

        if ($role_id) {
            $data['role'] = InfixRole::find($role_id);
        }
        $data['role_name'] = $role_name;
        $view = $role_id ? 'menumanage::role_index' : 'menumanage::index';

        return view($view, $data);
    }

    public function sectionUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $section = SmMenu::find($request->id);
        $section->name = $request->name;
        $section->lang_name = $request->name;
        $section->save();
        Toastr::success('Operation successful', 'Success');
        $route = route('menumanage.index',['role_name' => $request->role_name]);
        return redirect()->to($route);
    }

    public function deleteSection(Request $request)
    {

        if (config('app.app_sync')) {
            return $this->reloadWithData();
        }

        try {

            if ($request->id !== 1) {
                $role_id = $request->role_id;
                $is_role_based_sidebar = is_role_based_sidebar();
                $section = Sidebar::with('subModule')->where('id', $request->id)->when(! $is_role_based_sidebar, function ($q): void {
                    $q->where('user_id', Auth::user()->id);
                }, function ($q) use ($role_id): void {
                    $q->where('role_id', $role_id);
                })->first();
                if (count($section->subModule) !== 0) {

                    foreach ($section->subModule as $sidebar) {
                        $sidebar->update(['active_status' => 0]);
                    }
                }

                if ($section->permissionInfo->permission_section === 1 && count($section->subModule) === 0) {

                    Permission::when(! $is_role_based_sidebar, function ($q): void {
                        $q->where('user_id', Auth::user()->id);
                    }, function ($q) use ($role_id): void {
                        $q->where('role_id', $role_id);
                    })->where('id', $section->permission_id)->delete();
                    $section->delete();
                }

            }

            Cache::forget(sidebar_cache_key($role_id));

            return $this->reloadWithData();
        } catch (Exception $exception) {
            return response()->json([
                'msg' => __('common.Operation failed'),
            ], 500);
        }

    }

    public function removeSection(Request $request)
    {
        if (config('app.app_sync')) {
            return $this->reloadWithData();
        }
        if($request->id != 1){
            $role_id = $this->getRoleId($request->role_name);
            $menu = SmMenu::with(['childs' => function($q) use ($role_id){ $q->where('role_id',$role_id); }])
                           ->where('id',$request->id)
                           ->where('permission_section',1)
                           ->where('role_id',$role_id)
                           ->first();
            if($menu->childs->count() > 0){
                foreach($menu->childs as $child){
                   $child->update(['menu_status' => 0]);
                }
            }
            $menu->delete();
        }
        return $this->reloadWithData();
    }

    public function removeMenu(Request $request)
    {

        $is_role_based_sidebar = is_role_based_sidebar();
        $role_id = $request->role_id;

        $sidebar = Sidebar::with(['userChildMenu' => function ($q) use ($role_id, $is_role_based_sidebar): void {
            $q->when($is_role_based_sidebar, function ($q) use ($role_id): void {
                $q->where('role_id', $role_id)->whereNull('user_id');
            });
        }])->where('id', $request->id)->when(! $is_role_based_sidebar, function ($q): void {
            $q->where('user_id', Auth::user()->id);
        }, function ($q) use ($role_id): void {
            $q->where('role_id', $role_id);
        })->first();
        if ($sidebar && ! config('app.app_sync')) {
            if ($sidebar->userChildMenu->count() > 0) {
                foreach ($sidebar->userChildMenu as $child) {
                    $child->update(['active_status' => 0]);
                }

            }

            Sidebar::where('parent', $sidebar->permission_id)->update(['active_status' => 0]);
            $sidebar->active_status = 0;
            $sidebar->save();
        }

        Cache::forget(sidebar_cache_key($role_id));

        return $this->reloadWithData();

    }

    public function menuRemove(Request $request)
    {
        $data =  $request->all();

        $menu =  SmMenu::where('id',$data['id'])->first();

        if($menu) {
            DB::table('sm_menus')->where('id',$data['id'])->update(['menu_status' => 0]);
        }
        return $this->reloadWithData();
    }

     public function menuUpdate(Request $request)
    {

        if (! config('app.app_sync')) {
            $menuItemOrder = json_decode($request->get('order'));

            if ($request->unused_ids) {
                SmMenu::whereIn('id', $request->unused_ids)->update([
                    'menu_status' => 0,
                ]);
            }

            if ($request->ids) {
                SmMenu::whereIn('id', $request->ids)->update([
                    'menu_status' => 1,
                ]);
            }

        }

        $this->orderMenu($menuItemOrder, $request->menu_status, $request->section, $request->un_used);

        Cache::forget(sidebar_cache_key($request->role_id));

        return $this->reloadWithData();
    }

    public function sortSection(Request $request): void
    {
        $role_id = $request->role_id;
        if ($request->ids && ! config('app.app_sync')) {
            foreach ($request->ids as $key => $permissionSection) {

                $sidebar = SmMenu::find($permissionSection);

                if ($sidebar) {
                    $sidebar->position = $key + 1;
                    $sidebar->save();
                }

            }
        }

        Cache::forget(sidebar_cache_key($role_id));
    }

    public function resetMenu(Request $request)
    {
       set_time_limit(120);
            $role_id = $request->role_id;
            if(!empty($request->role_name))
            {
                    $role_name = $request->role_name;
            }else{
                if(Auth::user()->role_id == 2)
                {
                    $role_name = 'student';
                }elseif(Auth::user()->role_id == 3){
                    $role_name = 'parent';
                }else{
                    $role_name = 'staff';
                }
            }

            $role_ids = $this->getRoleids($role_name);

            Sidebar::when($role_name == 'student', function ($q)  use ($role_ids) {
                $q->whereIn('role_id',$role_ids);
            })->when($role_name == 'parent', function ($q)  use ($role_ids) {
                $q->whereIn('role_id',$role_ids);
            })->when($role_name == 'staff', function ($q)  use ($role_ids) {
                $q->whereNotIn('role_id',$role_ids);
            })->delete();


            $this->resetSidebarStore($role_name);
            Cache::forget(sidebar_cache_key($role_name));
            return redirect()->back();

    }

    public function resetWithDefault()
    {
        try {
            Sidebar::where('user_id', Auth::user()->id)->where('role_id', Auth::user()->role_id)->delete();
            $this->defaultSidebarStore();
            return redirect()->back();
        } catch (Exception $exception) {

        }

        return null;
    }

    public function getMenusData($role_name): array
    {
        // Existing unused menus from sm_menus helper (works for menu builder based items)
        $unused_menus = getUnusedMenus($role_name);
        $sidebar_menus = getMenus($role_name);

        // Also pull any legacy sidebar based items (sidebars table) that are inactive (active_status = 0)
        // but have valid permissions and are NOT already present in the unused list.
        try {
            $role_id = $this->getRoleId($role_name);

            $existingIds = collect($unused_menus)->pluck('id')->map(fn($v) => (int) $v)->all();

            $extraSidebars = Sidebar::leftJoin('permissions', 'sidebars.permission_id', '=', 'permissions.id')
                ->where('sidebars.role_id', $role_id)
                ->whereNull('sidebars.user_id')
                ->where('sidebars.active_status', 0)
                ->where('sidebars.ignore', 0)
                ->where('permissions.status', 1)
                ->where('permissions.menu_status', 1)
                ->select(
                    'sidebars.id as sidebar_row_id',
                    'sidebars.permission_id',
                    'sidebars.parent',
                    'sidebars.parent_route',
                    'sidebars.level',
                    'sidebars.position',
                    'permissions.name',
                    'permissions.lang_name',
                    'permissions.module',
                    'permissions.route'
                )
                ->orderBy('sidebars.position')
                ->get();

            foreach ($extraSidebars as $sb) {
                // Skip if already represented (by permission id or route match)
                if (in_array((int) $sb->permission_id, $existingIds, true)) {
                    continue;
                }
                $alreadyByRoute = collect($unused_menus)->first(function ($m) use ($sb) {
                    return isset($m->route) && $m->route === $sb->route;
                });
                if ($alreadyByRoute) continue;

                // Build a lightweight pseudo SmMenu-like object for the blade template
                $obj = new \stdClass();
                $obj->id = (int) $sb->permission_id; // use permission id as unique id
                $obj->permission_id = (int) $sb->permission_id;
                $obj->parent = $sb->parent; // blade uses ->parent
                $obj->parent_id = $sb->parent_route; // maintain structural hint
                $obj->lang_name = $sb->lang_name ?? $sb->name ?? 'Undefined';
                $obj->name = $sb->name ?? $obj->lang_name;
                $obj->module = $sb->module;
                $obj->route = $sb->route;
                $obj->position = $sb->position;
                // Provide empty collection for deActiveChild relationship usage in view
                $obj->deActiveChild = collect();
                $unused_menus[] = $obj;
            }

            // Sort combined list by position to keep UI consistent
            $unused_menus = collect($unused_menus)->sortBy(function ($item) {
                return $item->position ?? 9999;
            })->values();
        } catch (\Throwable $e) {
            // Fail silently; return what we have so UI still works
        }

        return ['unused_menus' => $unused_menus, 'sidebar_menus' => $sidebar_menus];
    }

     private function orderMenu(array $menuItems, $menu_status = 1, $parent_id = null, $un_used = null): void
    {

        foreach ($menuItems as $index => $item) {
            // Try to find SmMenu row
            $menuItem = SmMenu::where('id', $item->id)
                ->when(! $un_used, function ($q): void {
                    $q->where('menu_status', 1);
                })
                ->first();

            $data = [
                'position' => $index + 1,
                'parent_id' => $parent_id,
                'menu_status' => $menu_status ?? 1,
            ];

            // If not found, create new SmMenu row for sidebar-based item
            if (!$menuItem) {
                // Only create if item has route and name (sidebar-based)
                if (!empty($item->route) && !empty($item->name)) {
                    $menuItem = new SmMenu();
                    $menuItem->name = $item->name;
                    $menuItem->route = $item->route;
                    $menuItem->lang_name = $item->lang_name ?? $item->name;
                    $menuItem->module = $item->module ?? null;
                    $menuItem->parent_id = $parent_id;
                    $menuItem->position = $index + 1;
                    $menuItem->menu_status = $menu_status ?? 1;
                    $menuItem->role_id = $item->role_id ?? 1;
                    $menuItem->permission_section = 0;
                    $menuItem->is_saas = 0;
                    $menuItem->school_id = isset($item->school_id) ? $item->school_id : 1;
                    $menuItem->save();
                    // Set id for recursion
                    $item->id = $menuItem->id;
                }
            } else {
                $menuItem->update($data);
            }

            if ($menuItem && isset($item->children)) {
                $this->orderMenu($item->children, $menu_status, $menuItem->permission_id, $un_used);
            }
        }

    }

    private function reloadWithData()
    {

        if(!empty(request()->role_name)){
            $role_name = request()->role_name;
        }else{
            if(Auth::user()->role_id == 2)
            {
                $role_name = 'student';
            }elseif(Auth::user()->role_id == 3){
                $role_name = 'parent';
            }else{
                $role_name = 'staff';
            }
        }
        $data = $this->getMenusData($role_name);
        $data['role'] = InfixRole::find(request()->role_id);
        $data['role_name'] = $role_name;
        return response()->json([
            'msg' => 'Success',
            'available_list' => (string) view('menumanage::components.available_list', $data),
            'menus' => (string) view('menumanage::components.components', $data),
            'live_preview' => (string) view('menumanage::components.live_preview', $data),
        ], 200);
    }

    public function getRoleids($role_name)
    {
        if($role_name == 'student'){
            $role_ids = [2];
        }elseif($role_name == 'parent')
        {
            $role_ids = [3];
        }else{
            $role_ids = [2,3];
        }

        return $role_ids;
    }

    public function getRoleId($role_name = null)
    {
        if($role_name)
        {
            if($role_name == 'student')
            {
                return 2;
            }elseif($role_name == 'parent'){
                return 3;
            }else{
                return 1;
            }
        }else{
            if(Auth::user()->role_id == 2){
                return 2;
            }elseif(Auth::user()->role_id == 3){
                return 3;
            }else{
                return 1;
            }
        }
    }
}