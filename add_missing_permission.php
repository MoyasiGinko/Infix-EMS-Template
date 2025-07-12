<?php
/**
 * Add missing fees.fees-invoice-edit permission
 * Run this script once to add the missing permission to the database
 */

require_once 'bootstrap/app.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Permission data from the updated permission file
$permission = [
    'module' => null,
    'sidebar_menu' => null,
    'name' => 'Edit',
    'lang_name' => null,
    'icon' => null,
    'svg' => null,
    'route' => 'fees.fees-invoice-edit',
    'parent_route' => 'fees.fees-invoice-list',
    'is_admin' => 1,
    'is_teacher' => 0,
    'is_student' => 0,
    'is_parent' => 0,
    'position' => 1137,
    'is_saas' => 0,
    'is_menu' => 0,
    'status' => 1,
    'menu_status' => 1,
    'relate_to_child' => 0,
    'alternate_module' => null,
    'permission_section' => 0,
    'user_id' => null,
    'type' => 3,
    'old_id' => 1137,
];

try {
    // Check if permission already exists
    $existingPermission = \Modules\RolePermission\Entities\Permission::where('route', 'fees.fees-invoice-edit')->first();

    if ($existingPermission) {
        echo "Permission 'fees.fees-invoice-edit' already exists with ID: " . $existingPermission->id . "\n";
    } else {
        // Use the helper function to store the permission
        storePermissionData($permission);
        echo "Permission 'fees.fees-invoice-edit' has been added successfully!\n";

        // Verify it was created
        $newPermission = \Modules\RolePermission\Entities\Permission::where('route', 'fees.fees-invoice-edit')->first();
        if ($newPermission) {
            echo "Verification: Permission created with ID: " . $newPermission->id . "\n";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
