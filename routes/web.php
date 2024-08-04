<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\test;
use App\Http\Controllers\UpdateProfile;
use App\Http\Controllers\AdminController;



    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/layoutB', [test::class,'index']);
    Route::get('/editprofile', [HomeController::class,'editprofile'])->name('edit profile');

    //user orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');

    //products page(user)
    Route::get('/shop', [ShopController::class, 'index']);
    Route::post('/add_to_wishlist', [ProductController::class, 'addToWishlist'])->name('shop.addToWishlist');

    // User Registartion
    Route::get('/register', [UserController::class, 'userStore'])->name('register');
    Route::post('/store', [UserController::class, 'userStorage'])->name('user.store');

    // User Login
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/home', [UserController::class, 'home'])->name('home');

    //about
    Route::get('/about', [AboutController::class, 'about'])->name('about');

    //contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

    //user cart & checkout
    Route::group(['middleware' => 'auth'], function() {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('/add_to_cart', [ProductController::class, 'addToCart'])->name('addToCart');
    Route::post('/deleteall', [CartController::class, 'deleteAll'])->name('cart.deleteAll');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/order', [CartController::class, 'placeOrder'])->name('order.place');
    });

    //quick view
    Route::get('/quick_view/{id}', [ProductController::class, 'quickView'])->name('quick_view');

    //search
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::post('/searching', [SearchController::class, 'search'])->name('search');

    //Wishlist
    Route::group(['middleware' => 'auth'], function() {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/delete', [WishlistController::class, 'delete'])->name('wishlist.delete');
    Route::get('/wishlist/delete_all', [WishlistController::class, 'deleteAll'])->name('wishlist.delete_all');
    });

    //logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    //update profile
    Route::middleware('auth')->group(function () {
    Route::get('/profile/update', [UserController::class, 'showUpdateForm'])->name('profile.update');
    Route::post('/profile/update', [UpdateProfile::class, 'updateProfile'])->name('profile.update.post');
    });

    // Checkout
    Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.form');
    Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');
    });


/******************************************************************************************************/

    // admin dashboard

    Route::get('/layout', [HomeController::class,'layout'])->name('layout');
    
    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard.home');
    Route::get('/all_orders', [OrderController::class, 'indexdashboard']);
    Route::get('/pending', [OrderController::class, 'PendingPayment']);
    Route::get('/completed', [OrderController::class, 'CompletedPayment']);
    Route::post('/orders/update', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::get('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    Route::get('view_product/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('update_product/{id}', [ProductController::class, 'edit']);
    Route::post('/update_product/{id}', [ProductController::class, 'update']);
    Route::get('/profile', [AdminController::class,'profile'])->name('admin-profile');
    Route::get('/editProfile', [AdminController::class,'editProfile'])->name('edit.profile');
    Route::put('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/message', [AdminController::class,'message']);
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.delete');
    Route::get('/messages', [AdminController::class, 'message'])->name('messages');
    Route::get('/add_product', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products', [ProductController::class, 'product'])->name('admin.products.index');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('/update-payment-status', [OrderController::class, 'updatePaymentStatus'])->name('update-payment-status');
    Route::get('/delete-order/{id}', [OrderController::class, 'deleteOrder'])->name('delete-order');
    Route::get('/users', [AdminController::class, 'showUsers'])->name('users.show');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin-list', [AdminController::class, 'showAdmins'])->name('admin.list');
    Route::delete('/user/{id}', [AdminController::class, 'destroy'])->name('user.delete');
});

    Route::post('admin-logout', [AdminController::class, 'logout'])->name('admin-logout');

    // Registration Routes
    Route::get('admin-register', [AdminController::class, 'showRegistrationForm'])->name('admin-register');
    Route::post('/admin-register', [AdminController::class, 'register']);
    // Password Reset Routes
    Route::get('password/reset', [AdminController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [AdminController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [AdminController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AdminController::class, 'reset'])->name('password.update');
    Route::get('/category', [ProductController::class, 'showCategory'])->name('category');
