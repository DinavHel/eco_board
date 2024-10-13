<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('facilities', FacilityController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('areas', AreaController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('sensors', SensorController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
