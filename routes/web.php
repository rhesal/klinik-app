<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/template', function () {
    return view('template');
})->middleware(['auth', 'verified'])->name('template');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pasien', [ProfileController::class, 'view'])->name('profile.pasien');

    // Global Routes

});

require __DIR__.'/auth.php';

// Route::apiResource('pasien', PasienController::class);
