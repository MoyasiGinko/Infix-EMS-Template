<?php

/**
 * Notes Module Verification Script
 * Run this script to verify that the Notes module is properly integrated
 */

echo "🔍 Notes Module Integration Verification\n";
echo "=========================================\n\n";

$errors = [];
$warnings = [];
$success = [];

// Check if module is registered in modules_statuses.json
echo "1. Checking module registration...\n";
$modulesStatusFile = base_path('modules_statuses.json');
if (file_exists($modulesStatusFile)) {
    $modulesStatus = json_decode(file_get_contents($modulesStatusFile), true);
    if (isset($modulesStatus['Notes']) && $modulesStatus['Notes'] === true) {
        $success[] = "✅ Notes module is registered and enabled";
    } else {
        $errors[] = "❌ Notes module is not enabled in modules_statuses.json";
    }
} else {
    $errors[] = "❌ modules_statuses.json file not found";
}

// Check if module files exist
echo "2. Checking required module files...\n";
$requiredFiles = [
    'Modules/Notes/module.json',
    'Modules/Notes/Providers/NotesServiceProvider.php',
    'Modules/Notes/Providers/RouteServiceProvider.php',
    'Modules/Notes/Http/Controllers/NoteController.php',
    'Modules/Notes/Entities/Note.php',
    'Modules/Notes/Routes/web.php',
    'Modules/Notes/Database/Migrations/2025_07_30_000000_create_notes_table.php'
];

foreach ($requiredFiles as $file) {
    $fullPath = base_path($file);
    if (file_exists($fullPath)) {
        $success[] = "✅ File exists: $file";
    } else {
        $errors[] = "❌ Missing file: $file";
    }
}

// Check database table
echo "3. Checking database table...\n";
try {
    $tableExists = \Illuminate\Support\Facades\Schema::hasTable('notes');
    if ($tableExists) {
        $success[] = "✅ Notes table exists in database";
    } else {
        $errors[] = "❌ Notes table does not exist - run: php artisan migrate";
    }
} catch (Exception $e) {
    $errors[] = "❌ Database error: " . $e->getMessage();
}

// Check if permissions exist
echo "4. Checking permissions...\n";
try {
    $permissionsExist = \Illuminate\Support\Facades\DB::table('permissions')
        ->where('name', 'LIKE', 'notes_%')
        ->exists();

    if ($permissionsExist) {
        $success[] = "✅ Notes permissions exist in database";
    } else {
        $warnings[] = "⚠️ Notes permissions not found - run: php artisan module:seed Notes";
    }
} catch (Exception $e) {
    $errors[] = "❌ Permission check error: " . $e->getMessage();
}

// Check routes
echo "5. Checking routes...\n";
try {
    if (class_exists('\Modules\Notes\Http\Controllers\NoteController')) {
        $success[] = "✅ NoteController class is autoloaded";
    } else {
        $errors[] = "❌ NoteController not found - run: composer dump-autoload";
    }
} catch (Exception $e) {
    $errors[] = "❌ Route check error: " . $e->getMessage();
}

// Display results
echo "\n📊 VERIFICATION RESULTS\n";
echo "=======================\n\n";

if (!empty($success)) {
    echo "✅ SUCCESS:\n";
    foreach ($success as $item) {
        echo "   $item\n";
    }
    echo "\n";
}

if (!empty($warnings)) {
    echo "⚠️ WARNINGS:\n";
    foreach ($warnings as $item) {
        echo "   $item\n";
    }
    echo "\n";
}

if (!empty($errors)) {
    echo "❌ ERRORS:\n";
    foreach ($errors as $item) {
        echo "   $item\n";
    }
    echo "\n";
}

// Final status
if (empty($errors)) {
    if (empty($warnings)) {
        echo "🎉 ALL CHECKS PASSED! Notes module is ready for use.\n";
        echo "   Access it at: " . url('/notes') . "\n";
    } else {
        echo "✅ BASIC SETUP COMPLETE with some warnings.\n";
        echo "   The module should work, but address warnings for full functionality.\n";
    }
} else {
    echo "❌ SETUP INCOMPLETE - Please fix the errors above.\n";
}

echo "\n";
?>
