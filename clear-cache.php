<?php
// CACHE CLEARER - Access this file on your deployed site to clear all caches
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<h1>🔄 CACHE CLEARER</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
    .container { background: white; padding: 20px; border-radius: 8px; max-width: 800px; }
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .info { color: blue; }
    hr { margin: 20px 0; }
</style>";

echo "<div class='container'>";

try {
    echo "<h2>🚀 Starting Cache Clear Process...</h2>";

    // 1. Clear Application Cache
    echo "<h3>1. Application Cache</h3>";
    try {
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        echo "<span class='success'>✅ Application cache cleared successfully</span><br>";
    } catch (Exception $e) {
        echo "<span class='error'>❌ Error clearing application cache: " . $e->getMessage() . "</span><br>";
    }

    // 2. Clear Config Cache
    echo "<h3>2. Configuration Cache</h3>";
    try {
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        echo "<span class='success'>✅ Configuration cache cleared successfully</span><br>";
    } catch (Exception $e) {
        echo "<span class='error'>❌ Error clearing config cache: " . $e->getMessage() . "</span><br>";
    }

    // 3. Clear View Cache
    echo "<h3>3. View Cache</h3>";
    try {
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        echo "<span class='success'>✅ View cache cleared successfully</span><br>";
    } catch (Exception $e) {
        echo "<span class='error'>❌ Error clearing view cache: " . $e->getMessage() . "</span><br>";
    }

    // 4. Clear Route Cache
    echo "<h3>4. Route Cache</h3>";
    try {
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        echo "<span class='success'>✅ Route cache cleared successfully</span><br>";
    } catch (Exception $e) {
        echo "<span class='error'>❌ Error clearing route cache: " . $e->getMessage() . "</span><br>";
    }

    // 5. Clear Compiled Services
    echo "<h3>5. Compiled Services</h3>";
    try {
        \Illuminate\Support\Facades\Artisan::call('clear-compiled');
        echo "<span class='success'>✅ Compiled services cleared successfully</span><br>";
    } catch (Exception $e) {
        echo "<span class='error'>❌ Error clearing compiled services: " . $e->getMessage() . "</span><br>";
    }

    // 6. Manual cache directory cleanup
    echo "<h3>6. Manual Cache Directory Cleanup</h3>";

    $cacheDirectories = [
        'storage/framework/cache/data',
        'storage/framework/views',
        'storage/framework/sessions',
        'bootstrap/cache'
    ];

    foreach ($cacheDirectories as $dir) {
        $fullPath = base_path($dir);
        if (is_dir($fullPath)) {
            $files = glob($fullPath . '/*');
            $deletedCount = 0;
            foreach ($files as $file) {
                if (is_file($file) && basename($file) !== '.gitignore') {
                    if (unlink($file)) {
                        $deletedCount++;
                    }
                }
            }
            echo "<span class='success'>✅ Cleaned {$dir}: {$deletedCount} files deleted</span><br>";
        } else {
            echo "<span class='info'>ℹ️ Directory {$dir} does not exist</span><br>";
        }
    }

    echo "<hr>";
    echo "<h2>🎉 CACHE CLEAR COMPLETED!</h2>";
    echo "<p class='success'>All caches have been cleared. Now check your Sidebar Manager page.</p>";

    echo "<h3>📋 Next Steps:</h3>";
    echo "<ol>";
    echo "<li>Go to your admin panel: <strong>Settings → General Settings → Sidebar Manager</strong></li>";
    echo "<li>Look for <strong>'Notes'</strong> in the <strong>Available Menu Items</strong> list</li>";
    echo "<li>If you see Notes, drag it to the <strong>Used Menu Items</strong> section</li>";
    echo "<li>Clear your browser cache and refresh the page</li>";
    echo "</ol>";

    echo "<p class='info'>📅 Cache cleared at: " . date('Y-m-d H:i:s') . "</p>";

} catch (Exception $e) {
    echo "<span class='error'>❌ General Error: " . $e->getMessage() . "</span>";
}

echo "</div>";
?>
