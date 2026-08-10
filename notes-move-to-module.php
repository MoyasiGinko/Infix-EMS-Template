<?php
// Notes Fix - Move to Module Section
// This will move Notes under the Module section where it should appear

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>Move Notes to Module Section</h1>";
echo "<style>
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .info { color: blue; }
</style>";

try {
    // Find the Notes sidebar record
    $notesSidebar = DB::table('sidebars')
        ->where('permission_id', 1847)
        ->where('role_id', 1)
        ->first();

    if (!$notesSidebar) {
        echo "<p class='error'>❌ Notes sidebar record not found</p>";
        exit;
    }

    echo "<p class='info'>Current Notes parent: " . ($notesSidebar->parent ?? 'NULL') . "</p>";

    // Check Module section status
    $moduleSection = DB::table('sidebars')
        ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.permission_id', 1710) // Module section
        ->where('sidebars.role_id', 1)
        ->select('sidebars.*', 'permissions.lang_name')
        ->first();

    if ($moduleSection) {
        echo "<p class='info'>Module section status: active_status = {$moduleSection->active_status}</p>";
        echo "<p class='info'>Module section name: {$moduleSection->lang_name}</p>";

        if ($moduleSection->active_status == 0) {
            echo "<p class='success'>✅ Module section is inactive - perfect for unused items!</p>";
        } else {
            echo "<p class='error'>⚠️ Module section is active - but let's try anyway</p>";
        }
    } else {
        echo "<p class='error'>❌ Module section not found</p>";
        exit;
    }

    // Update Notes to be under Module section
    $updated = DB::table('sidebars')
        ->where('id', $notesSidebar->id)
        ->update([
            'parent' => 1710, // Module section
            'parent_route' => null,
            'level' => 2,
            'position' => 999,
            'updated_at' => now()
        ]);

    if ($updated) {
        echo "<p class='success'>✅ SUCCESS: Notes moved to Module section</p>";
        echo "<p class='success'>Notes should now appear in Available Menu Items!</p>";

        // Verify the update
        $verifyNotes = DB::table('sidebars')
            ->where('permission_id', 1847)
            ->where('role_id', 1)
            ->first();
        echo "<p class='info'>Verification - Notes parent is now: {$verifyNotes->parent}</p>";

    } else {
        echo "<p class='error'>❌ Failed to update Notes parent</p>";
    }

    echo "<h2>Next Steps:</h2>";
    echo "<p>1. Go to Sidebar Manager</p>";
    echo "<p>2. Look for Notes under the Module section in Available Menu Items</p>";
    echo "<p>3. If still not visible, try refreshing the page or clearing browser cache</p>";

} catch (Exception $e) {
    echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><em>Fix completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
