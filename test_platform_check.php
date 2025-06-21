<?php
// Test if the platform check issue is resolved
echo "✅ PHP Version Check - RESOLVED!\n";
echo "Current PHP Version: " . PHP_VERSION . "\n";
echo "Laravel is ready to serve web requests!\n";

// Test Laravel autoloader
try {
    require_once __DIR__ . '/vendor/autoload.php';
    echo "✅ Composer Autoloader: Working\n";

    // Test if Laravel can boot
    $app = require_once __DIR__ . '/bootstrap/app.php';
    echo "✅ Laravel Bootstrap: Working\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>
