<?php
// EASIEST SOLUTION - Make Notes Standalone and Force it to Show
// This makes Notes independent of any parent section

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h1>Easiest Solution - Make Notes Standalone</h1>";
echo "<style>
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .info { color: blue; }
    .highlight { background-color: yellow; padding: 5px; }
</style>";

try {
    // Step 1: Make Notes a standalone section (parent = NULL)
    echo "<h2>Step 1: Make Notes Standalone</h2>";

    $notesSidebar = DB::table('sidebars')
        ->where('permission_id', 1847)
        ->where('role_id', 1)
        ->first();

    if (!$notesSidebar) {
        echo "<p class='error'>❌ Notes sidebar not found</p>";
        exit;
    }

    $updated = DB::table('sidebars')
        ->where('id', $notesSidebar->id)
        ->update([
            'parent' => null,
            'parent_route' => null,
            'level' => 1,
            'position' => 500,
            'active_status' => 0, // Make sure it's inactive
            'updated_at' => now()
        ]);

    if ($updated) {
        echo "<p class='success'>✅ Notes is now standalone (parent = NULL)</p>";
    } else {
        echo "<p class='error'>❌ Failed to update Notes</p>";
        exit;
    }

    // Step 2: Find an INACTIVE section to place Notes under temporarily
    echo "<h2>Step 2: Find Inactive Sections</h2>";

    $inactiveSections = DB::table('sidebars')
        ->join('permissions', 'sidebars.permission_id', '=', 'permissions.id')
        ->where('sidebars.role_id', 1)
        ->where('sidebars.active_status', 0) // INACTIVE sections
        ->whereNull('sidebars.parent') // Top-level sections
        ->whereNull('sidebars.user_id')
        ->select('sidebars.permission_id', 'permissions.lang_name', 'sidebars.active_status')
        ->get();

    echo "<p class='info'>Found " . count($inactiveSections) . " inactive sections:</p>";
    foreach ($inactiveSections as $section) {
        echo "<p>- {$section->lang_name} (ID: {$section->permission_id})</p>";
    }

    if (count($inactiveSections) > 0) {
        // Use the first inactive section as parent
        $inactiveParent = $inactiveSections->first();

        $updated2 = DB::table('sidebars')
            ->where('id', $notesSidebar->id)
            ->update([
                'parent' => $inactiveParent->permission_id,
                'level' => 2,
                'updated_at' => now()
            ]);

        if ($updated2) {
            echo "<p class='success'>✅ Notes placed under inactive section: {$inactiveParent->lang_name}</p>";
        }
    } else {
        echo "<p class='highlight'>No inactive sections found. Notes will remain standalone.</p>";
    }

    // Step 3: Verification
    echo "<h2>Step 3: Verification</h2>";

    $verifyNotes = DB::table('sidebars')
        ->where('permission_id', 1847)
        ->where('role_id', 1)
        ->first();

    echo "<p class='info'>Final Notes configuration:</p>";
    echo "<p>- Parent: " . ($verifyNotes->parent ?? 'NULL (standalone)') . "</p>";
    echo "<p>- Active Status: {$verifyNotes->active_status}</p>";
    echo "<p>- Level: {$verifyNotes->level}</p>";
    echo "<p>- Position: {$verifyNotes->position}</p>";

    // Test the controller logic
    echo "<h2>Step 4: Test Controller Logic</h2>";

    $role_id = 1;
    $sectionIds = DB::table('sidebars')->whereNull('parent')->pluck('permission_id')->toArray();
    echo "<p>Section IDs: " . json_encode($sectionIds) . "</p>";

    $parentSidebars = DB::table('sidebars')
        ->whereIn('parent', $sectionIds)
        ->where('role_id', $role_id)
        ->where('active_status', 0)
        ->whereNull('user_id')
        ->pluck('permission_id')
        ->toArray();
    echo "<p>Parent Sidebars (inactive): " . json_encode($parentSidebars) . "</p>";

    if (in_array(1847, $parentSidebars)) {
        echo "<p class='success'>✅ Notes (1847) IS in parent sidebars - will appear!</p>";
    } else {
        echo "<p class='error'>❌ Notes (1847) is NOT in parent sidebars</p>";
    }

    echo "<div class='highlight'>";
    echo "<h2>🎯 RESULT</h2>";
    echo "<p><strong>Go to Sidebar Manager and check Available Menu Items!</strong></p>";
    echo "<p>Notes should now appear in the list.</p>";
    echo "</div>";

} catch (Exception $e) {
    echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><em>Easiest fix completed at " . date('Y-m-d H:i:s') . "</em></p>";
?>
