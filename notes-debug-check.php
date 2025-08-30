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

        echo "<h2>2. Assignment Check (Role 1 - Super Admin)</h2>";
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
    echo "<h2>5. DIAGNOSIS</h2>";
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
