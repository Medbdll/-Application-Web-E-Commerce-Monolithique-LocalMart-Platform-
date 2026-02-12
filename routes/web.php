<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Illuminate\Support\Facades\Mail;

// Role-based redirect route
Route::get('/', function () {
    if (Auth::check() && Auth::user()->hasRole(['admin', 'seller', 'moderator'])) {
        return redirect()->route('dashboard');
    }
    if (Auth::check() && Auth::user()->hasRole('client')) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
})->name('home.redirect');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:admin|seller|moderator', 'route.restrictions'])->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('dashboard.profile');
    Route::put('/dashboard/profile', [ProfileController::class, 'update'])->name('dashboard.profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('dashboard.profile.destroy');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name(name: 'dashboard');
    Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product');

    Route::get('/api-tokens', function () {
        return view('api-tokens.index');
    })->name('api-tokens.index');
});

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:client', 'route.restrictions'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:admin|seller', 'route.restrictions'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product');
    Route::get('/dashboard/orders', [OrderController::class, 'index'])->name('orders');
   });

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:admin', 'route.restrictions'])->group(function () {
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('users');
    Route::get('/dashboard/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/dashboard/users/userStatus', [UserController::class, 'userStatus'])->name('users.userStatus');
    Route::post('/dashboard/users/create', [UserController::class, 'store'])->name('users.store');
});
// Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:moderator'])->group(function () {
//     Route::get('/dashboard/users', [UserController::class, 'index'])->name('users');
//     Route::post('/dashboard/users/userStatus', [UserController::class, 'userStatus'])->name('users.userStatus');
// });

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:client', 'route.restrictions'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
});

Route::resource('products', ProductController::class)->middleware(['auth', 'route.restrictions']);
Route::resource('categories', CategoryController::class)->middleware(['auth', 'route.restrictions']);

Route::resource('order', OrderController::class)->middleware(['auth', 'route.restrictions']);

Route::post('infos/{cart}', [OrderController::class, 'verifyInfo'])->middleware(['auth', 'route.restrictions'])->name('infoBeforeOrder');
Route::resource('admin/products', ProductController::class)->middleware(['auth', 'route.restrictions']);
// Route::resource('users', UserController::class)->middleware('auth');


