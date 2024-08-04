<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;

// home page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/wishlist/add', [HomeController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('cart.add');

Route::get('/w', function () {
    return view('welcome');
});
// User Registartion
Route::get('/register', [UserController::class, 'userStore'])->name('register');
Route::post('/store', [UserController::class, 'userStorage'])->name('user.store');

// User Login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/home', [UserController::class, 'home'])->name('home');


Route::get('/shop', [ShopController::class, 'index']);
Route::post('/shop/add-to-wishlist', [ProductController::class, 'addToWishlist'])->name('shop.addToWishlist');
Route::post('/add_to_cart', [ProductController::class, 'addToCart'])->name('shop.addToCart');



Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart/delete-all', [CartController::class, 'deleteAll'])->name('cart.deleteAll');
});




    Route::get('/admin_register', [AdminController::class, 'adminRegister'])->name('admin.login');
    Route::post('/admin_register', [AdminController::class, 'adminStore'])->name('admin.login');




    Route::get('/products', [ProductController::class, 'product']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');

    
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');



Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/all_orders', [OrderController::class, 'indexdashboard'])->name('orders');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/searching', [SearchController::class, 'index'])->name('search');
Route::post('/search', [SearchController::class, 'search'])->name('search.post');

// Checkout
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [OrderController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.placeOrder');
});

Route::post('/logout', [UserController::class, 'logout']);

// Admin Logout
Route::post('admin-logout', [AdminController::class, 'logout'])->name('admin-logout');

// Admin Registration Routes
Route::get('admin-register', [AdminController::class, 'showRegistrationForm'])->name('admin-register');
Route::post('admin-register', [AdminController::class, 'register']);

// Password Reset Routes for Admins
Route::get('password/reset', [AdminController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [AdminController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [AdminController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AdminController::class, 'reset'])->name('password.update');

// Admin Dashboard and Profile Routes (protected)
Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/profile', [AdminController::class, 'editProfile'])->name('admin-profile');
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin-profile.update');
    Route::get('/messages', [AdminController::class, 'message'])->name('admin-messages');
    
    // Additional admin routes
    Route::get('/all_orders', [OrderController::class, 'indexdashboard']);
    Route::get('/pending', [OrderController::class, 'PendingPayment']);
    Route::get('/completed', [OrderController::class, 'CompletedPayment']);
    Route::post('/orders/update', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::get('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    Route::get('/view_product/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/update_product/{id}', [ProductController::class, 'edit']);
    Route::post('/update_product/{id}', [ProductController::class, 'update']);
    Route::get('/add_product', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products', [ProductController::class, 'product']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('/update-payment-status', [OrderController::class, 'updatePaymentStatus'])->name('update-payment-status');
    Route::get('/delete-order/{id}', [OrderController::class, 'deleteOrder'])->name('delete-order');
    Route::get('/category', [ProductController::class, 'showCategory'])->name('category');
});




