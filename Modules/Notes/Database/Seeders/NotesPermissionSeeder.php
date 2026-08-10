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
            ]
        ];

        foreach ($permissions as $permission) {
            // Check if permission already exists
            $exists = DB::table('permissions')->where('route', $permission['route'])->exists();
            if (!$exists) {
                $permissionId = DB::table('permissions')->insertGetId($permission);

                // Assign to Super Admin role (role_id = 1) using correct table
                DB::table('assign_permissions')->insert([
                    'permission_id' => $permissionId,
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
    }
}
