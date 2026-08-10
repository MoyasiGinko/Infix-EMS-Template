<?php
// RAW DATABASE ANALYSIS - Complete Sidebar Manager Table Inspection
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>RAW DATABASE ANALYSIS - Complete Sidebar Manager Data</h1>";
echo "<style>
    table { border-collapse: collapse; width: 100%; margin: 10px 0; font-size: 12px; }
    th, td { border: 1px solid #ddd; padding: 5px; text-align: left; }
    th { background-color: #f2f2f2; font-weight: bold; }
    .notes-row { background-color: yellow; }
    .inactive { background-color: #ffcccc; }
    .active { background-color: #ccffcc; }
    .section { margin: 20px 0; padding: 10px; border: 1px solid #ccc; }
</style>";

try {
    echo "<div class='section'>";
    echo "<h2>1. COMPLETE SIDEBARS TABLE - RAW DATA</h2>";

    // Get ALL sidebar records for role 1 (Super Admin)
    $allSidebars = DB::table('sidebars')
        ->leftJoin('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.role_id', 1)
        ->whereNull('sidebars.user_id')
        ->select(
            'sidebars.id as sidebar_id',
            'sidebars.permission_id',
            'sidebars.role_id',
            'sidebars.parent',
            'sidebars.parent_route',
            'sidebars.level',
            'sidebars.position',
            'sidebars.active_status',
            'permissions.name as perm_name',
            'permissions.route',
            'permissions.lang_name',
            'permissions.module',
            'permissions.status as perm_status',
            'permissions.menu_status'
        )
        ->orderBy('sidebars.active_status')
        ->orderBy('sidebars.position')
        ->get();

    echo "<p><strong>TOTAL SIDEBAR RECORDS FOR ROLE 1:</strong> " . count($allSidebars) . "</p>";

    echo "<table>";
    echo "<tr>
            <th>Sidebar ID</th>
            <th>Perm ID</th>
            <th>Permission Name</th>
            <th>Route</th>
            <th>Lang Name</th>
            <th>Module</th>
            <th>Parent</th>
            <th>Level</th>
            <th>Position</th>
            <th>Active</th>
            <th>Perm Status</th>
            <th>Menu Status</th>
          </tr>";

    $notesFound = false;
    $inactiveCount = 0;
    $activeCount = 0;

    foreach ($allSidebars as $sidebar) {
        $isNotes = ($sidebar->route === 'notes.index' || $sidebar->perm_name === 'notes' || $sidebar->perm_name === 'notes_menu');
        $rowClass = '';

        if ($isNotes) {
            $rowClass = 'notes-row';
            $notesFound = true;
        } elseif ($sidebar->active_status == 0) {
            $rowClass = 'inactive';
            $inactiveCount++;
        } else {
            $rowClass = 'active';
            $activeCount++;
        }

        echo "<tr class='{$rowClass}'>";
        echo "<td>{$sidebar->sidebar_id}</td>";
        echo "<td>{$sidebar->permission_id}</td>";
        echo "<td>" . ($sidebar->perm_name ?? 'NULL') . "</td>";
        echo "<td>" . ($sidebar->route ?? 'NULL') . "</td>";
        echo "<td>" . ($sidebar->lang_name ?? 'NULL') . "</td>";
        echo "<td>" . ($sidebar->module ?? 'NULL') . "</td>";
        echo "<td>" . ($sidebar->parent ?? 'NULL') . "</td>";
        echo "<td>{$sidebar->level}</td>";
        echo "<td>{$sidebar->position}</td>";
        echo "<td>{$sidebar->active_status}</td>";
        echo "<td>" . ($sidebar->perm_status ?? 'NULL') . "</td>";
        echo "<td>" . ($sidebar->menu_status ?? 'NULL') . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    if ($notesFound) {
        echo "<p style='color: green; font-weight: bold;'>✅ NOTES FOUND IN SIDEBARS TABLE (highlighted in yellow)</p>";
    } else {
        echo "<p style='color: red; font-weight: bold;'>❌ NOTES NOT FOUND in sidebars table</p>";
    }

    echo "<p><strong>Summary:</strong></p>";
    echo "<p>- Active items (green): {$activeCount}</p>";
    echo "<p>- Inactive items (red): {$inactiveCount}</p>";
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>2. PERMISSIONS TABLE - ALL NOTES-RELATED</h2>";

    // Search for ANY Notes-related permissions
    $notesPermissions = DB::table('permissions')
        ->where(function($query) {
            $query->where('name', 'LIKE', '%notes%')
                  ->orWhere('route', 'LIKE', '%notes%')
                  ->orWhere('lang_name', 'LIKE', '%Notes%');
        })
        ->get();

    echo "<p><strong>NOTES-RELATED PERMISSIONS:</strong> " . count($notesPermissions) . "</p>";

    if (count($notesPermissions) > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Route</th>
                <th>Lang Name</th>
                <th>Module</th>
                <th>Status</th>
                <th>Menu Status</th>
                <th>Position</th>
              </tr>";

        foreach ($notesPermissions as $perm) {
            echo "<tr>";
            echo "<td>{$perm->id}</td>";
            echo "<td>{$perm->name}</td>";
            echo "<td>" . ($perm->route ?? 'NULL') . "</td>";
            echo "<td>" . ($perm->lang_name ?? 'NULL') . "</td>";
            echo "<td>" . ($perm->module ?? 'NULL') . "</td>";
            echo "<td>" . ($perm->status ?? 'NULL') . "</td>";
            echo "<td>" . ($perm->menu_status ?? 'NULL') . "</td>";
            echo "<td>" . ($perm->position ?? 'NULL') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red;'>❌ NO Notes-related permissions found!</p>";
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>3. ASSIGN_PERMISSIONS TABLE - NOTES ASSIGNMENTS</h2>";

    if (count($notesPermissions) > 0) {
        $notesPermissionIds = $notesPermissions->pluck('id')->toArray();

        $notesAssignments = DB::table('assign_permissions')
            ->whereIn('permission_id', $notesPermissionIds)
            ->get();

        echo "<p><strong>NOTES PERMISSION ASSIGNMENTS:</strong> " . count($notesAssignments) . "</p>";

        if (count($notesAssignments) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Permission ID</th>
                    <th>Role ID</th>
                    <th>Status</th>
                    <th>Menu Status</th>
                    <th>School ID</th>
                  </tr>";

            foreach ($notesAssignments as $assign) {
                echo "<tr>";
                echo "<td>{$assign->id}</td>";
                echo "<td>{$assign->permission_id}</td>";
                echo "<td>{$assign->role_id}</td>";
                echo "<td>" . ($assign->status ?? 'NULL') . "</td>";
                echo "<td>" . ($assign->menu_status ?? 'NULL') . "</td>";
                echo "<td>" . ($assign->school_id ?? 'NULL') . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color: red;'>❌ NO Notes permission assignments found!</p>";
        }
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>4. RAW SIDEBARMANAGER CONTROLLER QUERY SIMULATION</h2>";

    // Simulate the exact query that SidebarManagerController::unUsedMenu() uses
    $role_id = 1;

    echo "<h3>Step-by-step SidebarManagerController Logic:</h3>";

    // Step 1: Get section IDs
    $sectionIds = DB::table('sidebars')->where('role_id', $role_id)->whereNull('parent')->pluck('permission_id')->toArray();
    echo "<p><strong>Step 1 - Section IDs:</strong> " . json_encode($sectionIds) . "</p>";

    // Step 2: Get parent sidebars (inactive items whose parent is a section)
    $parentSidebars = DB::table('sidebars')
        ->whereIn('parent', $sectionIds)
        ->where('role_id', $role_id)
        ->where('active_status', 0)
        ->whereNull('user_id')
        ->pluck('permission_id')
        ->toArray();
    echo "<p><strong>Step 2 - Parent Sidebars (inactive with section parents):</strong> " . json_encode($parentSidebars) . "</p>";

    // Step 3: Get single items (not children of the parent sidebars)
    $single = DB::table('sidebars')
        ->whereNotIn('parent', $parentSidebars)
        ->where('role_id', $role_id)
        ->where('active_status', 0)
        ->whereNull('user_id')
        ->pluck('permission_id')
        ->toArray();
    echo "<p><strong>Step 3 - Single Items (not children of inactive items):</strong> " . json_encode($single) . "</p>";

    // Step 4: Combine
    $hasIds = array_merge($parentSidebars, $single);
    $hasIds = array_unique($hasIds);
    echo "<p><strong>Step 4 - Combined IDs that will appear:</strong> " . json_encode($hasIds) . "</p>";

    // Final query that controller runs
    if (!empty($hasIds)) {
        $finalResult = DB::table('sidebars')
            ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
            ->whereIn('sidebars.permission_id', $hasIds)
            ->where('sidebars.role_id', $role_id)
            ->where('sidebars.active_status', 0)
            ->whereNull('sidebars.user_id')
            ->select('sidebars.id', 'permissions.name', 'permissions.route', 'permissions.lang_name')
            ->get();

        echo "<p><strong>FINAL CONTROLLER RESULT:</strong> " . count($finalResult) . " items</p>";

        echo "<table>";
        echo "<tr><th>Sidebar ID</th><th>Name</th><th>Route</th><th>Lang Name</th></tr>";
        foreach ($finalResult as $item) {
            $isNotes = ($item->route === 'notes.index' || $item->name === 'notes' || $item->name === 'notes_menu');
            $rowClass = $isNotes ? 'notes-row' : '';
            echo "<tr class='{$rowClass}'>";
            echo "<td>{$item->id}</td>";
            echo "<td>{$item->name}</td>";
            echo "<td>{$item->route}</td>";
            echo "<td>{$item->lang_name}</td>";
            echo "</tr>";
        }
        echo "</table>";

        $notesInFinal = $finalResult->where('route', 'notes.index')->first() ?? $finalResult->where('name', 'notes')->first() ?? $finalResult->where('name', 'notes_menu')->first();
        if ($notesInFinal) {
            echo "<p style='color: green; font-weight: bold;'>✅ NOTES WILL APPEAR in Available Menu Items</p>";
        } else {
            echo "<p style='color: red; font-weight: bold;'>❌ NOTES WILL NOT APPEAR in Available Menu Items</p>";
        }
    } else {
        echo "<p style='color: red; font-weight: bold;'>❌ NO ITEMS will appear - hasIds is empty!</p>";
    }

    echo "</div>";

} catch (Exception $e) {
    echo "<p style='color: red; font-weight: bold;'>❌ Error: " . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}

echo "<p><em>Raw database analysis completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
