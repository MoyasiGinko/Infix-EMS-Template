<?php
// Notes Parent Fix - Make Notes a standalone menu item
// Upload this to your server and run it once

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>Notes Parent Field Fix</h1>";

try {
    // Find the Notes sidebar record
    $notesSidebar = DB::table('sidebars')
        ->where('permission_id', 1847)
        ->where('role_id', 1)
        ->first();

    if ($notesSidebar) {
        echo "<p>Current Notes parent: " . ($notesSidebar->parent ?? 'NULL') . "</p>";

        // Update parent to NULL to make it standalone
        $updated = DB::table('sidebars')
            ->where('id', $notesSidebar->id)
            ->update([
                'parent' => null,
                'parent_route' => null,
                'level' => 1,
                'updated_at' => now()
            ]);

        if ($updated) {
            echo "<p style='color: green; font-weight: bold;'>✅ SUCCESS: Notes parent set to NULL</p>";
            echo "<p>Notes should now appear in Available Menu Items!</p>";
            echo "<p><strong>Go check your Sidebar Manager now!</strong></p>";
        } else {
            echo "<p style='color: red;'>❌ Failed to update</p>";
        }

    } else {
        echo "<p style='color: red;'>❌ Notes sidebar record not found</p>";
    }

} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><em>Fix completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
