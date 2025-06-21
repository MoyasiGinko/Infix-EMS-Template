<?php
echo "✅ Web Access Test - SUCCESS!\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n";

// Test autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
    echo "✅ Autoloader: Loaded successfully\n";

    // Test if we can load Laravel
    try {
        $app = require_once __DIR__ . '/bootstrap/app.php';
        echo "✅ Laravel App: Bootstrap successful\n";

        // Get Laravel version
        $laravel = $app->version();
        echo "✅ Laravel Version: " . $laravel . "\n";

    } catch (Exception $e) {
        echo "❌ Laravel Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "❌ Autoloader not found\n";
}

echo "\n🎉 Platform check completely bypassed - ready for web requests!";
?>
