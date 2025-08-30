<?php
// Clear All Caches - Access this file to clear all Laravel caches
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

echo "<h1>🧹 Cache Clearing Tool</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .success { color: green; font-weight: bold; }
    .info { color: blue; }
    .section { margin: 15px 0; padding: 10px; border: 1px solid #ddd; }
</style>";

try {
    echo "<div class='section'>";
    echo "<h2>Clearing Laravel Caches...</h2>";
    
    // Clear all cache types
    echo "<p class='info'>1. Clearing application cache...</p>";
    Cache::flush();
    echo "<p class='success'>✅ Application cache cleared</p>";
    
    echo "<p class='info'>2. Clearing config cache...</p>";
    Artisan::call('config:clear');
    echo "<p class='success'>✅ Config cache cleared</p>";
    
    echo "<p class='info'>3. Clearing view cache...</p>";
    Artisan::call('view:clear');
    echo "<p class='success'>✅ View cache cleared</p>";
    
    echo "<p class='info'>4. Clearing route cache...</p>";
    Artisan::call('route:clear');
    echo "<p class='success'>✅ Route cache cleared</p>";
    
    echo "<p class='info'>5. Clearing sidebar cache...</p>";
    // Clear specific sidebar caches
    $roleIds = [1, 2, 3]; // Super Admin, Student, Parent
    foreach($roleIds as $roleId) {
        Cache::forget("sidebar_menus_{$roleId}");
        Cache::forget("sidebar_cache_{$roleId}");
        echo "<p class='success'>✅ Sidebar cache cleared for role {$roleId}</p>";
    }
    
    echo "<p class='info'>6. Clearing permission cache...</p>";
    Cache::forget('spatie.permission.cache');
    echo "<p class='success'>✅ Permission cache cleared</p>";
    
    echo "</div>";
    
    echo "<div class='section'>";
    echo "<h2>🎉 All Caches Cleared Successfully!</h2>";
    echo "<p class='success'>You can now check the Sidebar Manager again.</p>";
    echo "<p class='info'>Go to: Settings → General Settings → Sidebar Manager</p>";
    echo "</div>";
    
    echo "<div class='section'>";
    echo "<h3>Next Steps:</h3>";
    echo "<ol>";
    echo "<li>Clear your browser cache (Ctrl+F5)</li>";
    echo "<li>Go to Sidebar Manager in your admin panel</li>";
    echo "<li>Look for 'Notes' in Available Menu Items</li>";
    echo "<li>If still not showing, the issue is in the frontend JavaScript</li>";
    echo "</ol>";
    echo "</div>";
    
} catch (Exception $e) {
    echo "<div class='section'>";
    echo "<h2 style='color: red;'>❌ Error occurred:</h2>";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>";
    echo "</div>";
}

echo "<p style='margin-top: 20px;'><small>Cache clearing completed at " . date('Y-m-d H:i:s') . "</small></p>";
?>
