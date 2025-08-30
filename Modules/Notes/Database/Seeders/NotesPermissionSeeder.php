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
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.index',
                'type' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes.expense-list',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.expenses.index',
                'type' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes.income-list',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.incomes.index',
                'type' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes.event-list',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.events.index',
                'type' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'notes.incident-list',
                'guard_name' => 'web',
                'module' => 'Notes',
                'route' => 'notes.incidents.index',
                'type' => 1,
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

        // Insert menu entries
        $menus = [
            [
                'name' => 'Notes',
                'module' => 'Notes',
                'route' => 'notes.index',
                'lang_name' => 'Notes',
                'icon' => 'fas fa-sticky-note',
                'status' => 1,
                'menu_status' => 1,
                'position' => 999,
                'default_position' => 999,
                'parent' => null,
                'parent_id' => null,
                'permission_section' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($menus as $menu) {
            // Check if menu already exists
            $exists = DB::table('sm_menus')->where('name', $menu['name'])->where('module', $menu['module'])->exists();
            if (!$exists) {
                DB::table('sm_menus')->insert($menu);
            }
        }

        // Assign permissions to Super Admin role (role_id = 1)
        $permissionIds = DB::table('permissions')
            ->whereIn('name', ['notes.menu', 'notes.expense-list', 'notes.income-list', 'notes.event-list', 'notes.incident-list'])
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
