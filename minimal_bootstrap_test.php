<?php
// Minimal Laravel bootstrap test to identify the UrlGenerator issue

echo "Testing Laravel bootstrap...\n";

require_once __DIR__ . '/vendor/autoload.php';

try {
    // Load environment
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    echo "✓ Environment loaded\n";    // Create app but don't bootstrap everything
    $app = new Illuminate\Foundation\Application(
        realpath(__DIR__)
    );
    echo "✓ Application instance created\n";

    // Bind basic services
    $app->singleton(
        Illuminate\Contracts\Http\Kernel::class,
        App\Http\Kernel::class
    );

    $app->singleton(
        Illuminate\Contracts\Console\Kernel::class,
        App\Console\Kernel::class
    );

    $app->singleton(
        Illuminate\Contracts\Debug\ExceptionHandler::class,
        App\Exceptions\Handler::class
    );
    echo "✓ Kernel bindings set\n";

    // Try to get console kernel
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    echo "✓ Console kernel created\n";

    // Try to bootstrap
    $kernel->bootstrap();
    echo "✓ Bootstrap successful\n";

} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Stack trace:\n";
    echo $e->getTraceAsString() . "\n";
}
