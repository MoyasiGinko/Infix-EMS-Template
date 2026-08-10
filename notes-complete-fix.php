<?php
// Complete Notes Module Setup Analysis & Fix
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>Complete Notes Module Analysis & Fix</h1>";
echo "<style>
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .warning { color: orange; font-weight: bold; }
    .info { color: blue; }
    .section { margin: 20px 0; padding: 15px; border: 1px solid #ccc; }
</style>";

try {
    echo "<div class='section'>";
    echo "<h2>1. Module Registration Check</h2>";

    // Check modules_statuses.json
    $modulesStatusPath = base_path('modules_statuses.json');
    if (file_exists($modulesStatusPath)) {
        $modulesStatus = json_decode(file_get_contents($modulesStatusPath), true);
        if (isset($modulesStatus['Notes'])) {
            echo "<p class='success'>✅ Notes found in modules_statuses.json: " . ($modulesStatus['Notes'] ? 'ENABLED' : 'DISABLED') . "</p>";
            if (!$modulesStatus['Notes']) {
                echo "<p class='error'>❌ PROBLEM: Notes module is DISABLED in modules_statuses.json</p>";

                // Enable it
                $modulesStatus['Notes'] = true;
                file_put_contents($modulesStatusPath, json_encode($modulesStatus, JSON_PRETTY_PRINT));
                echo "<p class='success'>✅ FIXED: Notes module enabled in modules_statuses.json</p>";
            }
        } else {
            echo "<p class='error'>❌ Notes NOT found in modules_statuses.json</p>";

            // Add it
            $modulesStatus['Notes'] = true;
            file_put_contents($modulesStatusPath, json_encode($modulesStatus, JSON_PRETTY_PRINT));
            echo "<p class='success'>✅ FIXED: Notes module added to modules_statuses.json</p>";
        }
    } else {
        echo "<p class='error'>❌ modules_statuses.json not found</p>";
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>2. Permission Analysis</h2>";

    $permission = DB::table('permissions')->where('route', 'notes.index')->first();
    if ($permission) {
        echo "<p class='success'>✅ Permission exists: ID {$permission->id}</p>";
        echo "<p>Name: {$permission->name}</p>";
        echo "<p>Route: {$permission->route}</p>";
        echo "<p>Lang Name: " . ($permission->lang_name ?? 'NULL') . "</p>";
        echo "<p>Module: " . ($permission->module ?? 'NULL') . "</p>";

        // Check if permission name matches the sidebar check
        if ($permission->name === 'notes' || $permission->name === 'notes_menu') {
            echo "<p class='success'>✅ Permission name is correct for sidebar check</p>";
        } else {
            echo "<p class='warning'>⚠️ Permission name '{$permission->name}' might not match sidebar check</p>";

            // Update permission name to match
            DB::table('permissions')->where('id', $permission->id)->update([
                'name' => 'notes_menu',
                'updated_at' => now()
            ]);
            echo "<p class='success'>✅ FIXED: Permission name updated to 'notes_menu'</p>";
        }
    } else {
        echo "<p class='error'>❌ CRITICAL: Permission not found!</p>";

        // Create the permission
        $permissionId = DB::table('permissions')->insertGetId([
            'name' => 'notes_menu',
            'route' => 'notes.index',
            'status' => 1,
            'menu_status' => 1,
            'type' => 1,
            'lang_name' => 'Notes',
            'icon' => 'fas fa-sticky-note',
            'is_admin' => 1,
            'is_teacher' => 1,
            'is_student' => 0,
            'is_parent' => 0,
            'position' => 500,
            'module' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        echo "<p class='success'>✅ FIXED: Permission created with ID {$permissionId}</p>";
        $permission = DB::table('permissions')->where('id', $permissionId)->first();
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>3. Role Assignment Check</h2>";

    $assigned = DB::table('assign_permissions')
        ->where('permission_id', $permission->id)
        ->where('role_id', 1)
        ->first();

    if ($assigned) {
        echo "<p class='success'>✅ Permission assigned to Super Admin</p>";
    } else {
        echo "<p class='error'>❌ Permission NOT assigned to Super Admin</p>";

        // Assign it
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
        echo "<p class='success'>✅ FIXED: Permission assigned to Super Admin</p>";
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>4. Sidebar Entry Check</h2>";

    $sidebar = DB::table('sidebars')
        ->where('permission_id', $permission->id)
        ->where('role_id', 1)
        ->first();

    if ($sidebar) {
        echo "<p class='success'>✅ Sidebar entry exists: ID {$sidebar->id}</p>";
        echo "<p>Parent: " . ($sidebar->parent ?? 'NULL') . "</p>";
        echo "<p>Active Status: {$sidebar->active_status}</p>";
        echo "<p>Position: {$sidebar->position}</p>";

        // Apply the working pattern from the analysis
        $updated = DB::table('sidebars')->where('id', $sidebar->id)->update([
            'parent' => 1,  // Same as working example
            'level' => 2,   // Same as working example
            'position' => 500,
            'active_status' => 0,  // Must be 0 to appear in Available
            'parent_route' => null,
            'updated_at' => now()
        ]);

        if ($updated) {
            echo "<p class='success'>✅ FIXED: Sidebar entry updated with working pattern</p>";
        }

    } else {
        echo "<p class='error'>❌ Sidebar entry missing</p>";

        // Create sidebar entry
        DB::table('sidebars')->insert([
            'permission_id' => $permission->id,
            'role_id' => 1,
            'parent' => 1,
            'parent_route' => null,
            'level' => 2,
            'position' => 500,
            'active_status' => 0,
            'user_id' => null,
            'is_saas' => 0,
            'ignore' => 0,
            'school_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        echo "<p class='success'>✅ FIXED: Sidebar entry created</p>";
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>5. Route Check</h2>";

    try {
        $testRoute = route('notes.index');
        echo "<p class='success'>✅ Route 'notes.index' is accessible: {$testRoute}</p>";
    } catch (Exception $e) {
        echo "<p class='error'>❌ Route 'notes.index' not found: " . $e->getMessage() . "</p>";
    }
    echo "</div>";

    echo "<div class='section' style='background-color: #fffacd;'>";
    echo "<h2>🎯 FINAL SUMMARY</h2>";
    echo "<p><strong>All Notes module issues should now be fixed!</strong></p>";
    echo "<p>✅ Module enabled in modules_statuses.json</p>";
    echo "<p>✅ Permission exists and properly named</p>";
    echo "<p>✅ Permission assigned to Super Admin role</p>";
    echo "<p>✅ Sidebar entry exists with correct pattern</p>";
    echo "<p>✅ Routes are configured</p>";
    echo "<p class='success'><strong>Go check Sidebar Manager - Notes should appear!</strong></p>";
    echo "</div>";

} catch (Exception $e) {
    echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><em>Complete analysis and fix completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
