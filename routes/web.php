<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\dashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/index', function () {
    return view('index');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin|seller'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('index');
    Route::get('/dashboard/product', [dashboardController::class, 'product'])->name('product');
    Route::get('/dashboard/orders', [dashboardController::class, 'orders'])->name('orders');
    Route::get('/dashboard/users', [dashboardController::class, 'users'])->name('users');
});
