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
                'name' => 'notes_view',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.index',
                'type' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes_add',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.store',
                'type' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes_edit',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.edit',
                'type' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes_delete',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.destroy',
                'type' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes_export',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.export.excel',
                'type' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($permissions as $permission) {
            // Check if permission already exists
            $exists = DB::table('permissions')->where('name', $permission['name'])->exists();
            if (!$exists) {
                DB::table('permissions')->insert($permission);
            }
        }

        // Assign permissions to Super Admin role (role_id = 1)
        $permissionIds = DB::table('permissions')
            ->whereIn('name', ['notes_view', 'notes_add', 'notes_edit', 'notes_delete', 'notes_export'])
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
