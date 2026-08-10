<?php

namespace Modules\Notes\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/**
 * Seeder to integrate the Notes module into the unified sm_menus navigation.
 * Idempotent: safe to run multiple times.
 */
class NotesMenuSeeder extends Seeder
{
    public function run(): void
    {
        // Basic guards
        if (!Schema::hasTable('permissions') || !Schema::hasTable('sm_menus')) {
            return; // environment not ready
        }

        // Locate (or create if somehow missing) the Notes permission first.
        $permission = DB::table('permissions')->where('route', 'notes.index')->first();
        if (!$permission) {
            $permissionId = DB::table('permissions')->insertGetId([
                'name' => 'notes_menu',
                'route' => 'notes.index',
                'status' => 1,
                'menu_status' => 1,
                'position' => 500,
                'is_saas' => 0,
                'relate_to_child' => 0,
                'is_menu' => 1,
                'is_admin' => 1,
                'is_teacher' => 1,
                'is_student' => 0,
                'is_parent' => 0,
                'type' => 1,
                'permission_section' => 0,
                'lang_name' => 'Notes',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $permission = DB::table('permissions')->find($permissionId);
        }

        // Ensure it is assigned to Super Admin (role_id=1) in assign_permissions.
        if (Schema::hasTable('assign_permissions')) {
            $assigned = DB::table('assign_permissions')
                ->where('permission_id', $permission->id)
                ->where('role_id', 1)
                ->first();
            if (!$assigned) {
                DB::table('assign_permissions')->insert([
                    'permission_id' => $permission->id,
                    'role_id' => 1,
                    'status' => 1,
                    'menu_status' => 1,
                    'saas_schools' => 0,
                    'created_by' => 1,
                    'school_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Determine a parent menu (Admin Section) to attach under for role 1.
        $adminSection = DB::table('sm_menus')
            ->where('role_id', 1)
            ->whereIn('route', ['admin_section', 'administration_section'])
            ->orderBy('route')
            ->first();

        $parentId = $adminSection?->id; // child container id (e.g., 69081)

        // If we matched the *section* (permission_section=1) we actually want a child like admin_section to host items.
        if ($adminSection && $adminSection->permission_section == 1) {
            // Find its first active child to mirror pattern; else keep null.
            $child = DB::table('sm_menus')
                ->where('role_id', 1)
                ->where('parent', $adminSection->id)
                ->where('permission_section', 0)
                ->orderBy('position')
                ->first();
            if ($child) {
                $parentId = $child->id; // put Notes alongside other admin tools
            }
        }

        // Fallback: if no admin section found, leave as standalone (parent null)

        // Check if Notes already present in sm_menus (by route & role)
        $existingMenu = DB::table('sm_menus')
            ->where('role_id', 1)
            ->where('route', 'notes.index')
            ->first();

        $position = 500; // default
        if ($parentId) {
            $maxPos = DB::table('sm_menus')
                ->where('role_id', 1)
                ->where(function ($q) use ($parentId) {
                    $q->where('parent', $parentId)->orWhere('parent_id', $parentId);
                })
                ->max('position');
            if (is_numeric($maxPos)) {
                $position = $maxPos + 1;
            }
        }

        if ($existingMenu) {
            // Update missing linkage / status if required
            DB::table('sm_menus')->where('id', $existingMenu->id)->update([
                'permission_id' => $permission->id,
                'name' => 'Notes',
                'module' => 'Notes',
                'lang_name' => 'Notes',
                'menu_status' => 1,
                'status' => 1,
                'parent' => $parentId,
                'parent_id' => $parentId,
                'position' => $existingMenu->position ?? $position,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('sm_menus')->insert([
                'name' => 'Notes',
                'module' => 'Notes',
                'route' => 'notes.index',
                'lang_name' => 'Notes',
                'section_id' => $parentId, // keep same pattern as siblings
                'icon' => 'fas fa-sticky-note',
                'status' => 1,
                'is_saas' => 0,
                'role_id' => 1,
                'is_alumni' => 0,
                'menu_status' => 1,
                'permission_section' => 0,
                'position' => $position,
                'default_position' => $position,
                'parent' => $parentId,
                'parent_id' => $parentId,
                'school_id' => 1,
                'alternate_module' => null,
                'permission_id' => $permission->id,
                'ignore' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Optional: also create for teacher role if a teacher menu root exists (role_id maybe 4 or 5 depending on install)
        foreach ([4,5] as $teacherRoleId) {
            $teacherRoot = DB::table('sm_menus')
                ->where('role_id', $teacherRoleId)
                ->where('permission_section', 1)
                ->orderBy('position')
                ->first();
            if (!$teacherRoot) {
                continue; // teacher menu not provisioned in this installation
            }
            $existingTeacher = DB::table('sm_menus')
                ->where('role_id', $teacherRoleId)
                ->where('route', 'notes.index')
                ->first();
            if ($existingTeacher) {
                DB::table('sm_menus')->where('id', $existingTeacher->id)->update([
                    'permission_id' => $permission->id,
                    'menu_status' => 1,
                    'status' => 1,
                    'updated_at' => now(),
                ]);
                continue;
            }
            $tPos = (DB::table('sm_menus')
                ->where('role_id', $teacherRoleId)
                ->where('parent', $teacherRoot->id)
                ->max('position')) + 1;
            DB::table('sm_menus')->insert([
                'name' => 'Notes',
                'module' => 'Notes',
                'route' => 'notes.index',
                'lang_name' => 'Notes',
                'section_id' => $teacherRoot->id,
                'icon' => 'fas fa-sticky-note',
                'status' => 1,
                'is_saas' => 0,
                'role_id' => $teacherRoleId,
                'is_alumni' => 0,
                'menu_status' => 1,
                'permission_section' => 0,
                'position' => $tPos,
                'default_position' => $tPos,
                'parent' => $teacherRoot->id,
                'parent_id' => $teacherRoot->id,
                'school_id' => 1,
                'alternate_module' => null,
                'permission_id' => $permission->id,
                'ignore' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
