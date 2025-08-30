<?php
// Analyze Other Modules and Fix Notes Properly
// This will study existing modules and apply the correct pattern to Notes

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>Module Analysis & Notes Fix</h1>";
echo "<style>
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .info { color: blue; }
    .highlight { background-color: yellow; padding: 5px; }
    table { border-collapse: collapse; width: 100%; margin: 10px 0; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
</style>";

try {
    echo "<h2>Step 1: Analyze Working Modules</h2>";

    // Get some working unused items to understand the pattern
    $workingUnusedItems = DB::table('sidebars')
        ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.role_id', 1)
        ->where('sidebars.active_status', 0)
        ->whereNull('sidebars.user_id')
        ->where('permissions.status', 1)
        ->where('permissions.menu_status', 1)
        ->where('permissions.route', '!=', 'notes.index') // Exclude Notes
        ->select('sidebars.*', 'permissions.name', 'permissions.route', 'permissions.lang_name', 'permissions.module')
        ->get();

    echo "<p class='info'>Found " . count($workingUnusedItems) . " working unused items:</p>";

    echo "<table>";
    echo "<tr><th>Name</th><th>Route</th><th>Module</th><th>Parent</th><th>Level</th><th>Position</th></tr>";
    foreach ($workingUnusedItems as $item) {
        echo "<tr>";
        echo "<td>{$item->lang_name}</td>";
        echo "<td>{$item->route}</td>";
        echo "<td>" . ($item->module ?? 'NULL') . "</td>";
        echo "<td>" . ($item->parent ?? 'NULL') . "</td>";
        echo "<td>{$item->level}</td>";
        echo "<td>{$item->position}</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Step 2: Analyze Parent-Child Relationships</h2>";

    // Find what makes items appear in SidebarManagerController
    $role_id = 1;

    // Step 1 of controller logic
    $sectionIds = DB::table('sidebars')->whereNull('parent')->pluck('permission_id')->toArray();
    echo "<p class='info'>Section IDs (parent=null): " . json_encode($sectionIds) . "</p>";

    // Step 2 - Find items whose parent is in sectionIds AND item is inactive
    $parentSidebars = DB::table('sidebars')
        ->whereIn('parent', $sectionIds)
        ->where('role_id', $role_id)
        ->where('active_status', 0)
        ->whereNull('user_id')
        ->pluck('permission_id')
        ->toArray();
    echo "<p class='info'>Parent Sidebars (inactive items with parent in sections): " . json_encode($parentSidebars) . "</p>";

    // Step 3 - Find items NOT in parent sidebars AND inactive
    $single = DB::table('sidebars')
        ->whereNotIn('parent', $parentSidebars)
        ->where('role_id', $role_id)
        ->where('active_status', 0)
        ->whereNull('user_id')
        ->pluck('permission_id')
        ->toArray();
    echo "<p class='info'>Single Items (not children of inactive items): " . json_encode($single) . "</p>";

    $hasIds = array_merge($parentSidebars, $single);
    $hasIds = array_unique($hasIds);
    echo "<p class='info'>Combined IDs that will appear: " . json_encode($hasIds) . "</p>";

    echo "<h2>Step 3: Find Best Pattern for Notes</h2>";

    // Look at successful patterns
    if (count($workingUnusedItems) > 0) {
        $bestExample = $workingUnusedItems->first();
        echo "<p class='success'>Best example to copy: {$bestExample->lang_name}</p>";
        echo "<p class='info'>Pattern: Parent={$bestExample->parent}, Level={$bestExample->level}, Position={$bestExample->position}</p>";

        if ($bestExample->parent) {
            // Find what section this parent belongs to
            $parentInfo = DB::table('sidebars')
                ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
                ->where('sidebars.permission_id', $bestExample->parent)
                ->where('sidebars.role_id', 1)
                ->select('sidebars.*', 'permissions.lang_name')
                ->first();

            if ($parentInfo) {
                echo "<p class='info'>Parent section: {$parentInfo->lang_name} (active_status: {$parentInfo->active_status})</p>";
            }
        }
    }

    echo "<h2>Step 4: Apply Best Pattern to Notes</h2>";

    // Find a good inactive parent or make Notes follow the working pattern
    $goodParent = null;

    if (count($workingUnusedItems) > 0) {
        foreach ($workingUnusedItems as $item) {
            if ($item->parent && in_array($item->parent, $sectionIds)) {
                // Check if this parent has space for more children
                $parentInfo = DB::table('sidebars')
                    ->where('permission_id', $item->parent)
                    ->where('role_id', 1)
                    ->first();

                if ($parentInfo && $parentInfo->active_status == 1) {
                    // This parent is active but has inactive children that show - this is the pattern!
                    $goodParent = $item->parent;
                    echo "<p class='success'>Found good parent pattern: {$item->parent}</p>";
                    break;
                }
            }
        }
    }

    // If no good parent found, use a section that exists
    if (!$goodParent && count($sectionIds) > 0) {
        // Use Administration section (commonly available)
        if (in_array(1702, $sectionIds)) {
            $goodParent = 1702; // Administration
        } elseif (in_array(1710, $sectionIds)) {
            $goodParent = 1710; // Module
        } else {
            $goodParent = $sectionIds[0]; // Use first available section
        }
    }

    if ($goodParent) {
        echo "<p class='info'>Using parent: {$goodParent}</p>";

        // Update Notes with the working pattern
        $updated = DB::table('sidebars')
            ->where('permission_id', 1847)
            ->where('role_id', 1)
            ->update([
                'parent' => $goodParent,
                'parent_route' => null,
                'level' => 2,
                'position' => 999,
                'active_status' => 0,
                'updated_at' => now()
            ]);

        if ($updated) {
            echo "<p class='success'>✅ Notes updated with working pattern</p>";

            // Test if Notes will now appear
            $newSectionIds = DB::table('sidebars')->whereNull('parent')->pluck('permission_id')->toArray();
            $newParentSidebars = DB::table('sidebars')
                ->whereIn('parent', $newSectionIds)
                ->where('role_id', $role_id)
                ->where('active_status', 0)
                ->whereNull('user_id')
                ->pluck('permission_id')
                ->toArray();

            if (in_array(1847, $newParentSidebars)) {
                echo "<p class='success'>🎉 SUCCESS: Notes (1847) will now appear in Available Menu Items!</p>";
            } else {
                echo "<p class='error'>⚠️ Notes may still not appear - need deeper investigation</p>";
            }
        } else {
            echo "<p class='error'>❌ Failed to update Notes</p>";
        }
    } else {
        echo "<p class='error'>❌ Could not find suitable parent</p>";
    }

    echo "<h2>Step 5: Final Verification</h2>";

    $finalNotes = DB::table('sidebars')
        ->where('permission_id', 1847)
        ->where('role_id', 1)
        ->first();

    echo "<p class='info'>Final Notes configuration:</p>";
    echo "<p>- Permission ID: 1847</p>";
    echo "<p>- Parent: " . ($finalNotes->parent ?? 'NULL') . "</p>";
    echo "<p>- Active Status: {$finalNotes->active_status}</p>";
    echo "<p>- Level: {$finalNotes->level}</p>";
    echo "<p>- Position: {$finalNotes->position}</p>";

    echo "<div class='highlight'>";
    echo "<h2>🎯 FINAL RESULT</h2>";
    echo "<p><strong>Go check Sidebar Manager now!</strong></p>";
    echo "<p>Notes should appear following the same pattern as other working modules.</p>";
    echo "</div>";

} catch (Exception $e) {
    echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><em>Module analysis and fix completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
