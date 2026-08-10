<?php
// Test New Sidebar Logic - Check if Notes appears in unused menu items
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Modules\MenuManage\Entities\Sidebar;
use Modules\RolePermission\Entities\Permission;

echo "<h1>🔍 Test New Sidebar Logic</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    table { border-collapse: collapse; width: 100%; margin: 10px 0; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    .notes-row { background-color: yellow; font-weight: bold; }
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .section { margin: 20px 0; padding: 15px; border: 1px solid #ccc; }
</style>";

try {
    echo "<div class='section'>";
    echo "<h2>Testing New unUsedMenu Logic for Role 1 (Super Admin)</h2>";

    $role_id = 1;

    // Test the new simplified logic
    $unusedSidebars = Sidebar::leftJoin('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.role_id', $role_id)
        ->whereNull('sidebars.user_id')
        ->where('sidebars.active_status', 0) // Unused items
        ->where('sidebars.ignore', 0) // Not ignored
        ->where('permissions.status', 1) // Permission is active
        ->where('permissions.menu_status', 1) // Permission allows menu display
        ->select(
            'sidebars.id as sidebar_id',
            'sidebars.permission_id',
            'sidebars.active_status',
            'sidebars.position',
            'permissions.name',
            'permissions.route',
            'permissions.lang_name',
            'permissions.module',
            'permissions.icon'
        )
        ->orderBy('sidebars.position')
        ->get();

    echo "<p><strong>Total unused menu items found:</strong> " . count($unusedSidebars) . "</p>";

    // Check if Notes is included
    $notesFound = $unusedSidebars->where('route', 'notes.index')->first();

    if ($notesFound) {
        echo "<p class='success'>✅ NOTES FOUND in unused menu items!</p>";
        echo "<p>Notes Details:</p>";
        echo "<ul>";
        echo "<li>Sidebar ID: {$notesFound->sidebar_id}</li>";
        echo "<li>Permission ID: {$notesFound->permission_id}</li>";
        echo "<li>Route: {$notesFound->route}</li>";
        echo "<li>Name: {$notesFound->name}</li>";
        echo "<li>Lang Name: {$notesFound->lang_name}</li>";
        echo "<li>Position: {$notesFound->position}</li>";
        echo "</ul>";
    } else {
        echo "<p class='error'>❌ Notes NOT found in unused menu items</p>";
    }

    echo "</div>";

    echo "<div class='section'>";
    echo "<h3>All Unused Menu Items (First 20):</h3>";
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>Sidebar ID</th><th>Permission ID</th><th>Name</th><th>Route</th><th>Lang Name</th><th>Position</th>";
    echo "</tr></thead><tbody>";

    foreach ($unusedSidebars->take(20) as $item) {
        $rowClass = ($item->route == 'notes.index') ? 'notes-row' : '';
        echo "<tr class='{$rowClass}'>";
        echo "<td>{$item->sidebar_id}</td>";
        echo "<td>{$item->permission_id}</td>";
        echo "<td>" . ($item->name ?? 'N/A') . "</td>";
        echo "<td>" . ($item->route ?? 'N/A') . "</td>";
        echo "<td>" . ($item->lang_name ?? 'N/A') . "</td>";
        echo "<td>{$item->position}</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    if (count($unusedSidebars) > 20) {
        echo "<p><em>... and " . (count($unusedSidebars) - 20) . " more items</em></p>";
    }
    echo "</div>";

    echo "<div class='section'>";
    echo "<h3>Comparison with Old Logic</h3>";
    echo "<p>The old complex logic was filtering out valid items due to parent-child relationship complications.</p>";
    echo "<p>The new simplified logic directly queries for:</p>";
    echo "<ul>";
    echo "<li>✅ Sidebar entries with active_status = 0 (unused)</li>";
    echo "<li>✅ For the specified role_id</li>";
    echo "<li>✅ With valid permissions (status = 1, menu_status = 1)</li>";
    echo "<li>✅ Not ignored (ignore = 0)</li>";
    echo "</ul>";
    echo "</div>";

} catch (Exception $e) {
    echo "<div class='section'>";
    echo "<h2 class='error'>❌ Error occurred:</h2>";
    echo "<p class='error'>" . $e->getMessage() . "</p>";
    echo "</div>";
}

echo "<p style='margin-top: 20px;'><small>Test completed at " . date('Y-m-d H:i:s') . "</small></p>";
?>
