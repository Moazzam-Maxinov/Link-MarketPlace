<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Route::get('/cache-optimize', function () {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');

    return 'Cache cleared and optimized successfully!';
});

// Only expose essential routes during development
if (!app()->environment('production')) {
    require __DIR__ . '/auth.php';  // Include login/register routes for dev only
}

// Redirect all other requests to the homepage
Route::fallback(function () {
    return redirect('/');
});
