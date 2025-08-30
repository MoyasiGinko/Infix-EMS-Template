<?php
// Notes Module Database Debug Check
// Upload this file to your server and access it via browser

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Authentication debug info
echo "<h1>Authentication Debug</h1>";
echo "<p>Auth check: " . (Auth::check() ? 'YES' : 'NO') . "</p>";
if (Auth::check()) {
    echo "<p>User ID: " . Auth::user()->id . "</p>";
    echo "<p>User Role ID: " . Auth::user()->role_id . "</p>";
    echo "<p>User Email: " . Auth::user()->email . "</p>";
} else {
    echo "<p style='color: red;'>Not authenticated. You might need to access this through your admin panel.</p>";
}

// Skip auth check for now - remove this line if you want to enforce auth
// if (!Auth::check() || Auth::user()->role_id != 1) {
//     echo "<h1>Please login as Super Admin to access this debug</h1>";
//     exit;
// }

echo "<h1>Notes Module Database Debug</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .section { margin: 20px 0; padding: 15px; border: 1px solid #ccc; }
    .found { color: green; font-weight: bold; }
    .not-found { color: red; font-weight: bold; }
    .count { color: blue; font-weight: bold; }
    pre { background: #f5f5f5; padding: 10px; }
</style>";

try {
    echo "<div class='section'>";
    echo "<h2>1. Permission Check</h2>";

    $permission = DB::table('permissions')->where('route', 'notes.index')->first();
        if ($permission) {
            echo "<p class='found'>✅ Permission exists: ID {$permission->id}, name: {$permission->name}</p>";
            echo "<p>Status: {$permission->status}, Menu Status: {$permission->menu_status}</p>";
            echo "<p>Is Admin: " . ($permission->is_admin ?? 'NULL') . ", Is Teacher: " . ($permission->is_teacher ?? 'NULL') . "</p>";
            echo "<p><strong>Module: '" . ($permission->module ?? 'NULL') . "'</strong> (This could be the filtering issue!)</p>";

            // Check if Notes module is in the paid modules list that gets filtered
            $paid_modules = ['Zoom','University','Gmeet','QRCodeAttendance','BBB','ParentRegistration','InfixBiometrics','AiContent','Lms','Certificate','Jitsi','WhatsappSupport','InAppLiveClass'];

            if (!empty($permission->module)) {
                if (in_array($permission->module, $paid_modules)) {
                    echo "<p class='warning'>⚠️ Notes module '{$permission->module}' is in paid modules list - needs moduleStatusCheck()</p>";
                } else {
                    echo "<p class='found'>✅ Notes module '{$permission->module}' is NOT in paid modules list - should show normally</p>";
                }
            } else {
                echo "<p class='found'>✅ Notes has no module set - should show in else block</p>";
            }        echo "<h2>2. Assignment Check (Role 1 - Super Admin)</h2>";
        $assigned = DB::table('assign_permissions')
            ->where('permission_id', $permission->id)
            ->where('role_id', 1)
            ->first();
        if ($assigned) {
            echo "<p class='found'>✅ Permission assigned: ID {$assigned->id}</p>";
            echo "<p>Status: {$assigned->status}, Menu Status: {$assigned->menu_status}</p>";
        } else {
            echo "<p class='not-found'>❌ Permission NOT assigned to Super Admin role</p>";
        }

        echo "<h2>3. Sidebar Check (Role 1)</h2>";
        $sidebar = DB::table('sidebars')
            ->where('permission_id', $permission->id)
            ->where('role_id', 1)
            ->first();
        if ($sidebar) {
            echo "<p class='found'>✅ Sidebar entry exists: ID {$sidebar->id}</p>";
            echo "<p>Active Status: {$sidebar->active_status} " . ($sidebar->active_status == 0 ? "(Should appear in UNUSED list)" : "(Should appear in USED list)") . "</p>";
            echo "<p>Position: {$sidebar->position}</p>";
        } else {
            echo "<p class='not-found'>❌ No sidebar entry found</p>";
        }

    } else {
        echo "<p class='not-found'>❌ No permission found for notes.index route</p>";
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>4. Menu Items Count Summary</h2>";

    // Count unused items (what should appear in "Available Menu Items")
    $unusedItems = DB::table('sidebars')
        ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.role_id', 1)
        ->where('sidebars.active_status', 0)
        ->whereNull('sidebars.user_id')
        ->where('permissions.status', 1)
        ->where('permissions.menu_status', 1)
        ->select('sidebars.id as sidebar_id', 'permissions.name', 'permissions.route', 'permissions.lang_name')
        ->get();

    // Count used items (what should appear in sidebar)
    $usedItems = DB::table('sidebars')
        ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.role_id', 1)
        ->where('sidebars.active_status', 1)
        ->whereNull('sidebars.user_id')
        ->where('permissions.status', 1)
        ->where('permissions.menu_status', 1)
        ->select('sidebars.id as sidebar_id', 'permissions.name', 'permissions.route', 'permissions.lang_name')
        ->get();

    echo "<p class='count'>📊 Total UNUSED menu items (Available): " . count($unusedItems) . "</p>";
    echo "<p class='count'>📊 Total USED menu items (In Sidebar): " . count($usedItems) . "</p>";

    // Check specifically for Notes in unused
    $notesInUnused = $unusedItems->where('route', 'notes.index')->first();
    if ($notesInUnused) {
        echo "<p class='found'>✅ Notes IS in unused items (should appear in Available Menu Items list)</p>";
        echo "<pre>Notes data: " . json_encode($notesInUnused, JSON_PRETTY_PRINT) . "</pre>";
    } else {
        echo "<p class='not-found'>❌ Notes is NOT in unused items</p>";
    }

    // Check specifically for Notes in used
    $notesInUsed = $usedItems->where('route', 'notes.index')->first();
    if ($notesInUsed) {
        echo "<p class='found'>✅ Notes IS in used items (should appear in sidebar)</p>";
        echo "<pre>Notes data: " . json_encode($notesInUsed, JSON_PRETTY_PRINT) . "</pre>";
    } else {
        echo "<p>Notes is not in used items (expected if inactive)</p>";
    }

    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>5. Frontend Controller Logic Debug</h2>";

    // Simulate exactly what SidebarManagerController::unUsedMenu() does
    echo "<p>Testing SidebarManagerController::unUsedMenu() logic:</p>";

    $role_id = 1;
    $hasSidebarData = DB::table('sidebars')->where('role_id', $role_id)->whereNull('user_id')->exists();

    echo "<p><strong>Has sidebar data for role 1:</strong> " . ($hasSidebarData ? 'YES' : 'NO') . "</p>";

    if ($hasSidebarData) {
        // This replicates the exact SidebarManagerController logic
        echo "<h4>SidebarManagerController will use this complex query logic:</h4>";

        $sectionIds = DB::table('sidebars')->whereNull('parent')->pluck('permission_id')->toArray();
        echo "<p>Step 1 - Section IDs (parent = null): " . json_encode($sectionIds) . "</p>";

        $parentSidebars = DB::table('sidebars')
            ->whereIn('parent', $sectionIds)
            ->where('role_id', $role_id)
            ->where('active_status', 0)
            ->whereNull('user_id')
            ->pluck('permission_id')
            ->toArray();
        echo "<p>Step 2 - Parent Sidebars (active_status=0): " . json_encode($parentSidebars) . "</p>";

        $single = DB::table('sidebars')
            ->whereNotIn('parent', $parentSidebars)
            ->where('role_id', $role_id)
            ->where('active_status', 0)
            ->whereNull('user_id')
            ->pluck('permission_id')
            ->toArray();
        echo "<p>Step 3 - Single Items (not in parent): " . json_encode($single) . "</p>";

        $hasIds = array_merge($parentSidebars, $single);
        $hasIds = array_unique($hasIds);
        echo "<p>Step 4 - Combined IDs: " . json_encode($hasIds) . "</p>";

        // Check if Notes permission ID is in the hasIds
        $notesPermissionId = 1847;
        if (in_array($notesPermissionId, $hasIds)) {
            echo "<p class='found'>✅ Notes permission ID ({$notesPermissionId}) IS in hasIds - will be processed</p>";
        } else {
            echo "<p class='not-found'>❌ Notes permission ID ({$notesPermissionId}) is NOT in hasIds - will be filtered out!</p>";
        }

        if ($hasIds !== []) {
            $controllerResult = DB::table('sidebars')
                ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
                ->whereIn('sidebars.permission_id', $hasIds)
                ->where('sidebars.role_id', $role_id)
                ->where('sidebars.active_status', 0)
                ->whereNull('sidebars.user_id')
                ->select('sidebars.id', 'sidebars.permission_id', 'permissions.name', 'permissions.route', 'permissions.lang_name', 'permissions.module', 'sidebars.parent')
                ->get();

            echo "<p><strong>Controller result count:</strong> " . count($controllerResult) . "</p>";

            $notesInController = $controllerResult->where('route', 'notes.index')->first();
            if ($notesInController) {
                echo "<p class='found'>✅ Notes WILL appear in controller result</p>";
                echo "<pre>Controller Notes data: " . json_encode($notesInController, JSON_PRETTY_PRINT) . "</pre>";
            } else {
                echo "<p class='not-found'>❌ Notes will NOT appear in controller result</p>";
                if (count($controllerResult) > 0) {
                    echo "<p><strong>Items that WILL appear:</strong></p>";
                    foreach ($controllerResult as $item) {
                        echo "<p>- {$item->name} ({$item->route})</p>";
                    }
                } else {
                    echo "<p>No items will appear at all!</p>";
                }
            }
        } else {
            echo "<p class='not-found'>❌ hasIds is empty - controller will return empty collection</p>";
        }
    } else {
        echo "<p>No sidebar data exists - controller would show all permissions</p>";
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>7. PARENT FIELD DEBUG - This is the problem!</h2>";

    // Check the parent field for Notes sidebar record
    $notesSidebar = DB::table('sidebars')->where('permission_id', 1847)->where('role_id', 1)->first();
    if ($notesSidebar) {
        echo "<p><strong>Notes sidebar parent field:</strong> " . ($notesSidebar->parent ?? 'NULL') . "</p>";

        // Check what the parent field should be for unused items
        echo "<h4>Analyzing the parent field logic:</h4>";

        // Get section IDs (these are permissions that have parent=null in sidebars)
        $sectionIds = DB::table('sidebars')->whereNull('parent')->pluck('permission_id')->toArray();
        echo "<p>Section IDs (parent=null): " . json_encode($sectionIds) . "</p>";

        // Check if Notes parent field causes the filtering issue
        if ($notesSidebar->parent && in_array($notesSidebar->parent, $sectionIds)) {
            echo "<p class='not-found'>❌ PROBLEM: Notes parent ({$notesSidebar->parent}) is in sectionIds</p>";
            echo "<p>This means Notes is treated as a child item, but its parent might not be inactive</p>";

            // Check if parent is inactive
            $parentSidebar = DB::table('sidebars')
                ->where('permission_id', $notesSidebar->parent)
                ->where('role_id', 1)
                ->first();
            if ($parentSidebar) {
                echo "<p>Parent sidebar active_status: {$parentSidebar->active_status}</p>";
                if ($parentSidebar->active_status == 1) {
                    echo "<p class='not-found'>❌ PROBLEM: Parent is active (1), so Notes gets filtered out!</p>";
                    echo "<p class='found'>✅ SOLUTION: Set Notes parent to NULL or make it standalone</p>";
                } else {
                    echo "<p>Parent is inactive, this should work...</p>";
                }
            }
        } else {
            echo "<p>Notes parent logic seems OK...</p>";
        }

        echo "<h4>SOLUTION OPTIONS:</h4>";
        echo "<p><strong>Option 1 (Recommended):</strong> Set Notes parent to NULL to make it a standalone menu item</p>";
        echo "<p><strong>Option 2:</strong> Make sure Notes parent is also inactive (active_status=0)</p>";
    }

    echo "</div>";

    echo "<div class='section'>";
    echo "<h2>8. DIAGNOSIS</h2>";
    if ($notesInUnused) {
        echo "<p class='found'><strong>BACKEND STATUS: ✅ GOOD</strong></p>";
        echo "<p>Notes appears correctly in the backend unused menu query.</p>";
        echo "<p><strong>IF Notes is NOT showing in the Available Menu Items list on the frontend, the issue is:</strong></p>";
        echo "<ul>";
        echo "<li>🐛 FRONTEND JavaScript filtering</li>";
        echo "<li>🐛 Browser caching</li>";
        echo "<li>🐛 Frontend view filtering out items</li>";
        echo "</ul>";
        echo "<p><strong>Solutions to try:</strong></p>";
        echo "<ul>";
        echo "<li>Clear browser cache / try incognito</li>";
        echo "<li>Check browser console for JS errors</li>";
        echo "<li>Check if the frontend code filters items by name/route</li>";
        echo "</ul>";
    } else {
        echo "<p class='not-found'><strong>BACKEND STATUS: ❌ PROBLEM</strong></p>";
        echo "<p>Notes is missing from backend data. Need to fix database entries.</p>";
    }
    echo "</div>";

} catch (Exception $e) {
    echo "<div class='section'>";
    echo "<h2>❌ ERROR</h2>";
    echo "<p>Debug failed: " . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
    echo "</div>";
}

echo "<p><em>Debug completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
