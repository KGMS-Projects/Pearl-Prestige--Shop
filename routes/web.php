<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  // Add this line
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CheckoutController;

// Public Routes
Route::get('/', function () {
    return view('homepage');
})->name('home');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Category Routes
Route::get('/women', [CategoryController::class, 'women'])->name('category.women');
Route::get('/men', [CategoryController::class, 'men'])->name('category.men');
Route::get('/accessories', [CategoryController::class, 'accessories'])->name('category.accessories');

// Shopping Cart Routes
Route::get('/cart', function () {
    return view('cart.index');
})->name('cart.index');

// Search Routes
Route::get('/search', function () {
    return view('search.index');
})->name('search.index');

// Protected Routes (Require Authentication)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();  // Use Auth::user() instead of auth()->user()

        // If user is admin (is_admin = 1), redirect to admin dashboard
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        // If user is customer (is_admin = 0), redirect to homepage
        return redirect()->route('home');
    })->name('dashboard');
});

// Admin Routes (Require Authentication + Admin Role)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Instead of linking to separate pages, use the dashboard with modals
    Route::get('/admin/orders', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin.orders');

    Route::get('/admin/products', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin.products');

    Route::get('/admin/users', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin.users');

    // Product CRUD Routes
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}', [AdminController::class, 'showProduct'])->name('products.show');
    Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'destroyProduct'])->name('products.destroy');

    // Category CRUD Routes
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('categories.create');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::get('/categories/{category}/edit', [AdminController::class, 'editCategory'])->name('categories.edit');
    Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('categories.destroy');

    // Order Management
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{order}', [AdminController::class, 'showOrder'])->name('orders.show');
    Route::put('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.update-status');

    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');
    Route::put('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');

    // Analytics & Reports
    Route::get('/analytics', [AdminController::class, 'analytics'])->name('analytics');
    Route::get('/reports/sales', [AdminController::class, 'salesReport'])->name('reports.sales');
    Route::get('/reports/inventory', [AdminController::class, 'inventoryReport'])->name('reports.inventory');

    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
});

// Checkout Routes (Require Authentication)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/confirmation/{order}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
    Route::post('/checkout/payment/{order}', [CheckoutController::class, 'processPayment'])->name('checkout.payment');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
