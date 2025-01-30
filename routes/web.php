<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PublisherServiceController;
use App\Http\Controllers\User\VendorServiceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('common.home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/counter', [CounterController::class, 'index']);

// Routes for Admin
// All admin routes are prefixed with /admin and use the AdminController.
// The name('admin.') prefix allows naming routes like admin.dashboard.
// Admin routes (only accessible by role = 1)
Route::middleware(['auth', 'role:1'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-website', [AdminController::class, 'addWebsiteForm'])->name('add-website-form');
    Route::post('/add-website', [AdminController::class, 'addWebsite'])->name('add-website');
    Route::get('/websites-list', [AdminController::class, 'viewWebsites'])->name('websites-list');
    Route::get('/websites/data', [AdminController::class, 'getWebsites'])->name('websites.data'); // Add this new route for API
    Route::get('/websites/{id}', [AdminController::class, 'showWebsiteDetails'])->name('showWebsiteDetails');

    // API Routes
    Route::get('/api/websitedetail/{id}', [AdminController::class, 'getWebsiteDetails']);
});
// Route::get('/api/websitedetail/{id}', [AdminController::class, 'getWebsiteDetails']);

// Route::get('/admin/websites/{id}', function () {
//     return view('admin.website-details');
// })->name('admin.websites.show');

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin/websites', [AdminController::class, 'getWebsites']);
    // Route::get('/admin/websites/{id}', [AdminController::class, 'show']);
    // Route::get('/admin/websites/{id}', function () {
    //     return view('admin.websites.show');
    // })->name('admin.websites.show');
});

// User routes (only accessible by role = 0)
Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/publisher/orders/new', [PublisherServiceController::class, 'newPublisherOrders'])->name('user.publisher-new-orders');
    Route::get('/publisher/orders', [PublisherServiceController::class, 'allPublisherOrders'])->name('user.publisher-all-orders');
    Route::get('/vendor/orders', [VendorServiceController::class, 'allVendorOrders'])->name('user.vendor-all-orders');
    Route::get('/websites', [VendorServiceController::class, 'allWebsites'])->name('user.allWebsites');
    Route::get('/websites/buy-link', [VendorServiceController::class, 'buyLink'])->name('user.buyLink');
    Route::post('/websites/buy-link', [VendorServiceController::class, 'placeOrder'])->name('user.placeOrder');
    Route::get('/websites/buy-link/order-confirmation', [VendorServiceController::class, 'orderConfirmation'])->name('user.order-confirmation');
    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.change-password');
    Route::put('/change-password', [UserController::class, 'changePassword'])->name('user.update-password');

    Route::get('/api/dashboard-data', [UserController::class, 'fetchDashboardData'])->name('user.fetchDashboardData');
    Route::post('/api/switch-role', [UserController::class, 'switchRole'])->name('user.switchRole');
    Route::get('/api/publisher-data', [UserController::class, 'getPublisherDashbordData'])->name('user.getPublisherDashbordData');
    Route::get('/api/publisher/orders/new', [PublisherServiceController::class, 'getNewPublisherOrders'])->name('getNewPublisherOrders');
    Route::get('/api/publisher/orders', [PublisherServiceController::class, 'getAllPublisherOrders'])->name('getAllPublisherOrders');
    Route::get('/api/vendor/orders', [VendorServiceController::class, 'getAllVendorOrders'])->name('getAllVendorOrders');
    Route::get('/api/getAllWebsites', [VendorServiceController::class, 'getAllWebsites'])->name('getAllWebsites');
    Route::get('/api/getAllCategories', [VendorServiceController::class, 'getAllCategories'])->name('getAllCategories');
    // Add other user routes here...
});

// Route::get('/dashboard1', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Logout Route
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__ . '/auth.php';
