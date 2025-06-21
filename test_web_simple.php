<?php

// Simple web test to check school binding
require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Create a simple request to test the binding
$request = Illuminate\Http\Request::create('/', 'GET');

try {
    // Process request through Laravel
    $response = $kernel->handle($request);

    echo "HTTP Status: " . $response->getStatusCode() . "\n";

    if ($response->getStatusCode() < 500) {
        echo "✓ Application loads without fatal errors\n";
    } else {
        echo "✗ Application has server errors\n";

        // Get response content to see errors
        $content = $response->getContent();
        if (strpos($content, 'Target class [school] does not exist') !== false) {
            echo "✗ School binding error still exists\n";
        } else {
            echo "Response content excerpt: " . substr($content, 0, 200) . "...\n";
        }
    }

} catch (\Exception $e) {
    echo "✗ Exception: " . $e->getMessage() . "\n";

    if (strpos($e->getMessage(), 'Target class [school] does not exist') !== false) {
        echo "✗ School binding error detected\n";
    }
}

$kernel->terminate($request, $response ?? null);
