<?php

namespace Modules\Notes\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert permissions for Notes module
        $permissions = [
            [
                'name' => 'notes.menu',
                'route' => 'notes.index',
                'status' => 1,
                'menu_status' => 1,
                'position' => 500,
                'is_saas' => 0,
                'relate_to_child' => 0,
                'is_menu' => 1,
                'is_admin' => 1,
                'is_teacher' => 0,
                'is_student' => 0,
                'is_parent' => 0,
                'type' => 1,
                'permission_section' => 0,
                'old_id' => 500,
                'lang_name' => 'Notes',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($permissions as $permission) {
            // Check if permission already exists
            $exists = DB::table('permissions')->where('route', $permission['route'])->exists();
            if (!$exists) {
                DB::table('permissions')->insert($permission);
            }
        }

        // Assign permissions to Super Admin role (role_id = 1)
        $permissionIds = DB::table('permissions')
            ->whereIn('route', ['notes.index'])
            ->pluck('id');

        foreach ($permissionIds as $permissionId) {
            $exists = DB::table('role_has_permissions')
                ->where('role_id', 1)
                ->where('permission_id', $permissionId)
                ->exists();

            if (!$exists) {
                DB::table('role_has_permissions')->insert([
                    'role_id' => 1,
                    'permission_id' => $permissionId,
                ]);
            }
        }
    }
}
