<?php

use App\Http\Controllers\{ProfileController, OrderController, PlaceController};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(IsAdmin::class)->group(function () {
    Route::controller(PlaceController::class)->group(function () {
        Route::get('/place/create', 'create')->name('place.create');
        Route::post('/place/store', 'store')->name('place.store');
        Route::get('/place/edit/{place}', 'edit')->name('place.edit');
        Route::patch('/place/update/{place}', 'update')->name('place.update');
        Route::delete('/place/destroy/{place}', 'destroy')->name('place.destroy');
    });
});

Route::controller(PlaceController::class)->group(function () {
    Route::get('/orders', 'index')->name('order.index');
    Route::post('/order/store', 'store')->name('order.store');
    Route::middleware(IsAdmin::class)->group(function () {
        Route::get('/order/edit/{order}', 'edit')->name('order.edit');
        Route::patch('/order/update/{order}', 'update')->name('order.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
