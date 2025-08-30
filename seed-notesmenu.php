<?php
/**
 * Notes Module Full Integration Seeder (Permissions + Menu)
 * URL: /seed-notesmenu.php
 * Safe to run multiple times (idempotent).
 *
 * Creates/updates:
 *  - Base menu permission (notes.index)
 *  - Action permissions (create, store, edit, update, destroy, export pdf/excel)
 *  - assign_permissions rows for target roles
 *  - sm_menus entries for target roles (Super Admin + Teacher roles if present)
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\RolePermission\Entities\Permission;

require_once __DIR__ . '/bootstrap/app.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

header('Content-Type: text/plain');

echo "== NOTES MODULE INTEGRATION SEED ==\n";

if (!function_exists('storePermissionData')) {
    echo "storePermissionData helper missing. Aborting.\n";
    exit;
}

if (!Schema::hasTable('permissions') || !Schema::hasTable('assign_permissions')) {
    echo "Required tables missing. Aborting.\n";
    exit;
}

$rolesTarget = [1,4,5]; // Super Admin, possible teacher roles
$roles = DB::table('roles')->whereIn('id',$rolesTarget)->pluck('id')->toArray();
$existingRoles = array_values($roles);
if (empty($existingRoles)) {
    echo "No target roles found.\n";
}

echo "Target roles found: ".implode(',',$existingRoles)."\n";

$basePosition = 500;
$now = now();

$permissions = [
    [
        'module'=> 'Notes',
        'sidebar_menu'=> null,
        'name' => 'Notes',
        'lang_name' => 'Notes',
        'icon' => 'fas fa-sticky-note',
        'svg' => null,
        'route' => 'notes.index',
        'parent_route' => null,
        'is_admin' => 1,
        'is_teacher' => 1,
        'is_student' => 0,
        'is_parent' => 0,
        'position' => $basePosition,
        'is_saas' => 0,
        'is_menu' => 1,
        'status' => 1,
        'menu_status' => 1,
        'relate_to_child' => 0,
        'alternate_module' => null,
        'permission_section' => 0,
        'type' => 1,
        'old_id' => null,
        'child' => []
    ],
];

$actionRoutes = [
    ['route' => 'notes.create','name'=>'Create','type'=>3],
    ['route' => 'notes.store','name'=>'Store','type'=>3],
    ['route' => 'notes.edit','name'=>'Edit','type'=>3],
    ['route' => 'notes.update','name'=>'Update','type'=>3],
    ['route' => 'notes.destroy','name'=>'Delete','type'=>3],
    ['route' => 'notes.export.excel','name'=>'Export Excel','type'=>3],
    ['route' => 'notes.export.pdf','name'=>'Export PDF','type'=>3],
];

$offset = 1;
foreach ($actionRoutes as $a) {
    $permissions[0]['child'][] = [
        'module'=> 'Notes',
        'sidebar_menu'=> null,
        'name' => $a['name'],
        'lang_name' => null,
        'icon' => null,
        'svg' => null,
        'route' => $a['route'],
        'parent_route' => 'notes.index',
        'is_admin' => 1,
        'is_teacher' => 1,
        'is_student' => 0,
        'is_parent' => 0,
        'position' => $basePosition + $offset,
        'is_saas' => 0,
        'is_menu' => 0,
        'status' => 1,
        'menu_status' => 1,
        'relate_to_child' => 0,
        'alternate_module' => null,
        'permission_section' => 0,
        'type' => $a['type'],
        'old_id' => null,
    ];
    $offset++;
}

// Insert / update permissions set
foreach ($permissions as $p) {
    storePermissionData($p); // handles children recursively
}

echo "Permissions ensured.\n";

// Fetch base permission record
$basePermission = Permission::where('route','notes.index')->first();
if (!$basePermission) {
    echo "Base permission creation failed.\n";
    exit;
}

// Ensure assign_permissions rows
foreach ($existingRoles as $rid) {
    $exists = DB::table('assign_permissions')
        ->where('permission_id',$basePermission->id)
        ->where('role_id',$rid)
        ->first();
    if (!$exists) {
        DB::table('assign_permissions')->insert([
            'permission_id'=>$basePermission->id,
            'role_id'=>$rid,
            'status'=>1,
            'menu_status'=>1,
            'saas_schools'=>0,
            'created_by'=>1,
            'school_id'=>1,
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        echo "Added assign_permissions for role {$rid}.\n";
    } else {
        echo "assign_permissions already present for role {$rid}.\n";
    }
}

// Run menu seeder logic (duplicate minimal logic instead of instantiating seeder)
if (!Schema::hasTable('sm_menus')) {
    echo "sm_menus table missing; skipping menu integration.\n";
    exit;
}

// Determine admin section parent for role 1
$adminSection = DB::table('sm_menus')
    ->where('role_id',1)
    ->whereIn('route',[ 'admin_section','administration_section'])
    ->orderBy('route')
    ->first();
$parentId = $adminSection?->id;
if ($adminSection && $adminSection->permission_section == 1) {
    $child = DB::table('sm_menus')->where('role_id',1)->where('parent',$adminSection->id)->where('permission_section',0)->orderBy('position')->first();
    if ($child) { $parentId = $child->id; }
}

$menuRoles = $existingRoles; // create for these roles
foreach ($menuRoles as $roleId) {
    $menuExists = DB::table('sm_menus')->where('role_id',$roleId)->where('route','notes.index')->first();
    if ($menuExists) {
        DB::table('sm_menus')->where('id',$menuExists->id)->update([
            'permission_id'=>$basePermission->id,
            'status'=>1,
            'menu_status'=>1,
            'updated_at'=>$now,
        ]);
        echo "Updated existing sm_menus row for role {$roleId}.\n";
        continue;
    }
    $pos = 600; // default; if parent set, append after max position
    if ($parentId) {
        $max = DB::table('sm_menus')->where('role_id',$roleId)->where('parent',$parentId)->max('position');
        if (is_numeric($max)) { $pos = $max + 1; }
    }
    DB::table('sm_menus')->insert([
        'name'=>'Notes',
        'module'=>'Notes',
        'route'=>'notes.index',
        'lang_name'=>'Notes',
        'section_id'=>$parentId,
        'icon'=>'fas fa-sticky-note',
        'status'=>1,
        'is_saas'=>0,
        'role_id'=>$roleId,
        'is_alumni'=>0,
        'menu_status'=>1,
        'permission_section'=>0,
        'position'=>$pos,
        'default_position'=>$pos,
        'parent'=>$parentId,
        'parent_id'=>$parentId,
        'school_id'=>1,
        'alternate_module'=>null,
        'permission_id'=>$basePermission->id,
        'ignore'=>0,
        'created_at'=>$now,
        'updated_at'=>$now,
    ]);
    echo "Inserted sm_menus row for role {$roleId} (position {$pos}).\n";
}

echo "== DONE ==\n";
