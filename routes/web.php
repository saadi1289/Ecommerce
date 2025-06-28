<?php

use App\Models\Coupon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;

require __DIR__ . '/auth.php';


Route::get('/shop', function () {
    return view('front.shop');
});
Route::get('/cart', function () {
    return view('cart.index');
});
Route::get('/checkout', function () {
    return view('checkout.index');
});
Route::get('/product_detail', function () {
    return view('product.product_details');
});

Route::get('/admin/settings', function () {
    return view('admin.settings');
});

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/product/{id}', [FrontendController::class, 'showProductDetails'])->name('product.details');

Route::middleware(['auth', 'Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('coupons', CouponController::class)->except(['show']);

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/newsletter', function () {
    return view('newsletter');
})->name('newsletter.subscribe');

use App\Http\Controllers\Admin\NotificationController;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('admin.notifications.index');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('admin.notifications.read.all');
    Route::post('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('admin.notifications.read');
});
