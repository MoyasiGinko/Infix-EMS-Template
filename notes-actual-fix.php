<?php
// ACTUAL FIX - Copy the Exact Working Pattern to Notes
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>ACTUAL NOTES FIX - Copy Working Pattern</h1>";

try {
    // The working example showed: reports.report has Parent=1, Level=2, Position=178
    // Let's apply the EXACT same pattern to Notes

    echo "<h2>Applying Working Pattern to Notes:</h2>";
    echo "<p>Working example: reports.report - Parent=1, Level=2, Position=178</p>";

    $updated = DB::table('sidebars')
        ->where('permission_id', 1847) // Notes permission ID
        ->where('role_id', 1)
        ->update([
            'parent' => 1,           // EXACT same parent as working example
            'level' => 2,            // EXACT same level as working example
            'position' => 500,       // Different position to avoid conflicts
            'active_status' => 0,    // Must be inactive to appear in Available
            'parent_route' => null,
            'updated_at' => now()
        ]);

    if ($updated) {
        echo "<p style='color: green; font-weight: bold;'>✅ SUCCESS: Notes now uses EXACT same pattern as working module</p>";

        // Verify the update
        $verifyNotes = DB::table('sidebars')
            ->where('permission_id', 1847)
            ->where('role_id', 1)
            ->first();

        echo "<h3>Verification:</h3>";
        echo "<p>Notes Parent: {$verifyNotes->parent}</p>";
        echo "<p>Notes Level: {$verifyNotes->level}</p>";
        echo "<p>Notes Active Status: {$verifyNotes->active_status}</p>";
        echo "<p>Notes Position: {$verifyNotes->position}</p>";

        echo "<div style='background: yellow; padding: 10px; margin: 10px 0;'>";
        echo "<h2>🎯 NOTES IS NOW FIXED!</h2>";
        echo "<p><strong>Go to Sidebar Manager - Notes should appear in Available Menu Items!</strong></p>";
        echo "</div>";

    } else {
        echo "<p style='color: red;'>❌ Failed to update Notes</p>";
    }

} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><em>ACTUAL fix completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
