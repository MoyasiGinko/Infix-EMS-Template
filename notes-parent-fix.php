<?php
// Notes Proper Fix - Place Notes under a relevant section
// Upload this to your server and run it once

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>Notes Proper Fix - Place Under Section</h1>";
echo "<style>
    .option { margin: 10px 0; padding: 10px; border: 1px solid #ccc; }
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
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

    echo "<p>Current Notes parent: " . ($notesSidebar->parent ?? 'NULL') . "</p>";

    // Find available sections (active sections that could be parents)
    $availableSections = DB::table('sidebars')
        ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.role_id', 1)
        ->where('sidebars.active_status', 1)
        ->whereNull('sidebars.parent')
        ->whereNull('sidebars.user_id')
        ->select('sidebars.permission_id', 'permissions.name', 'permissions.lang_name', 'sidebars.position')
        ->orderBy('sidebars.position')
        ->get();

    echo "<h2>Available Sections to Place Notes Under:</h2>";
    foreach ($availableSections->take(10) as $section) {
        echo "<div class='option'>";
        echo "<strong>{$section->lang_name}</strong> (ID: {$section->permission_id}, Position: {$section->position})";
        echo "</div>";
    }

    // Auto-select the best section (usually Academic or Student related)
    $bestSection = null;
    $preferredSections = ['Academic', 'Student', 'Academics', 'Students', 'Reports', 'Administration'];

    foreach ($preferredSections as $preferred) {
        $found = $availableSections->first(function($section) use ($preferred) {
            return stripos($section->lang_name, $preferred) !== false;
        });
        if ($found) {
            $bestSection = $found;
            break;
        }
    }

    // If no preferred section found, use the first available
    if (!$bestSection && $availableSections->count() > 0) {
        $bestSection = $availableSections->first();
    }

    if ($bestSection) {
        echo "<h2>Recommended Action:</h2>";
        echo "<p class='success'>✅ Place Notes under: <strong>{$bestSection->lang_name}</strong></p>";

        // Update Notes to be under this section
        $updated = DB::table('sidebars')
            ->where('id', $notesSidebar->id)
            ->update([
                'parent' => $bestSection->permission_id,
                'parent_route' => null, // This might need to be set to parent's route
                'level' => 2, // Child level
                'position' => 999, // Place at end
                'updated_at' => now()
            ]);

        if ($updated) {
            echo "<p class='success'>✅ SUCCESS: Notes placed under {$bestSection->lang_name}</p>";
            echo "<p class='success'>Notes should now appear in Available Menu Items!</p>";
            echo "<p><strong>Go check your Sidebar Manager now!</strong></p>";
        } else {
            echo "<p class='error'>❌ Failed to update</p>";
        }

    } else {
        echo "<p class='error'>❌ No suitable section found to place Notes under</p>";
        echo "<p>You may need to manually specify a parent section ID</p>";
    }

} catch (Exception $e) {
    echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><em>Fix attempted at " . date('Y-m-d H:i:s') . "</em></p>";
?>