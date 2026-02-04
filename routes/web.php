<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductController;

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
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin|seller'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard2');
});

Route::resource('products', ProductController::class)->middleware('auth');



