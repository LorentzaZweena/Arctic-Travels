<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;
use App\Models\Resort;

use App\Http\Controllers\ResortController;
use App\Http\Controllers\BookingController;

Route::get('/', [App\Http\Controllers\ResortController::class, 'landing'])->name('landing');
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('landing');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/resort/{resort}/book', [BookingController::class, 'store'])->name('resorts.book');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [ResortController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/resort/create', [ResortController::class, 'create'])->name('admin.resort.create');
    Route::post('/admin/resort/store', [ResortController::class, 'store'])->name('admin.resort.store');
    Route::get('/admin/resort/{resort}/edit', [ResortController::class, 'edit'])->name('admin.resort.edit');
    Route::put('/admin/resort/{resort}', [ResortController::class, 'update'])->name('admin.resort.update');
    Route::delete('/admin/resort/{resort}', [ResortController::class, 'destroy'])->name('admin.resort.destroy');
    Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::put('/admin/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
});

require __DIR__.'/auth.php';
