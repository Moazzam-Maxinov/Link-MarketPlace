<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

// Only expose essential routes during development
if (!app()->environment('production')) {
    require __DIR__ . '/auth.php';  // Include login/register routes for dev only
}

// Redirect all other requests to the homepage
Route::fallback(function () {
    return redirect('/');
});
