<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $permission = [
            "module" => null,
            "name" => "Edit",
            "parent_route" => "fees.fees-invoice-list",
            "lang_name" => null,
            "route" => "fees.fees-invoice-edit",
            "status" => 1,
            "menu_status" => 1,
            "position" => 1137,
            "is_saas" => 0,
            "relate_to_child" => 0,
            "is_menu" => 0,
            "is_admin" => 1,
            "is_teacher" => 0,
            "is_student" => 0,
            "is_parent" => 0,
            "type" => 3,
            "permission_section" => 0,
            "old_id" => 1137,
        ];

        // Check if permission already exists
        $existingPermission = DB::table('permissions')->where('route', 'fees.fees-invoice-edit')->first();

        if (!$existingPermission) {
            DB::table('permissions')->insert(array_merge($permission, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('permissions')->where('route', 'fees.fees-invoice-edit')->delete();
    }
};
