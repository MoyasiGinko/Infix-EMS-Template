<?php

use App\InfixModuleManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

if (config('app.app_sync')) {
    Route::get('/', 'LandingController@index')->name('/');
}


if (moduleStatusCheck('Saas')) {
    Route::group(['middleware' => ['subdomain'], 'domain' => '{subdomain}.' . config('app.short_url')], function ($routes) {
        require 'tenant.php';
    });

    Route::group(['middleware' => ['subdomain'], 'domain' => '{subdomain}'], function ($routes) {
        require 'tenant.php';
    });
}

Route::group(['middleware' => ['subdomain']], function ($routes) {
    require 'tenant.php';
});

Route::get('install/done', function() {
    return redirect()->to(url('/login'));
})->name('service.done');

Route::get('install', function() {
    return redirect()->to(url('/login'));
});

Route::get('home', function() {
    return redirect()->to(url('/admin-dashboard'));
});

Route::get('show-log', function() {
    $path = storage_path('logs/laravel.log');
    if (!file_exists($path)) {
        return 'No laravel.log file found';
    }
    $content = file_get_contents($path);
    $lines = explode("\n", $content);
    return response('<pre>' . htmlspecialchars(implode("\n", array_slice($lines, -150))) . '</pre>');
});

Route::get('migrate', function () {
    if (!Storage::exists('.app_installed') || (Auth::check() && Auth::id() == 1)) {
        @set_time_limit(0);
        @ini_set('max_execution_time', 0);
        @ini_set('memory_limit', '-1');
        try {
            Artisan::call('migrate', ['--force' => true]);
            Brian2694\Toastr\Facades\Toastr::success('Migration run successfully');
        } catch (\Throwable $e) {
            Brian2694\Toastr\Facades\Toastr::error($e->getMessage());
            return response('Migration error: ' . $e->getMessage(), 500);
        }

        return redirect()->to(url('/admin-dashboard'));
    }
    abort(404);
});

Route::post('editor/upload-file', 'UploadFileController@upload_image');
// Route::get('hide-routes',[HomeController::class,'hideRoute']);
