<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\TypeFishController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/fishes', [FishController::class, 'index'])->name('fishes.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/fishes/create', [FishController::class, 'create'])->name('fishes.create');
    Route::post('/fishes', [FishController::class, 'store'])->name('fishes.store');
    Route::get('/fishes/{fish}/edit', [FishController::class, 'edit'])->name('fishes.edit');
    Route::patch('/fishes/{fish}', [FishController::class, 'update'])->name('fishes.update');
    Route::delete('/fishes/{fish}', [FishController::class, 'destroy'])->name('fishes.destroy');

    Route::get('/types', [TypeFishController::class, 'index'])->name('types.index');
    Route::get('/types/create', [TypeFishController::class, 'create'])->name('types.create');
    Route::post('/types', [TypeFishController::class, 'store'])->name('types.store');
    Route::delete('/types/{type}', [TypeFishController::class, 'destroy'])->name('types.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/fishes/{fish}', [FishController::class, 'show'])->name('fishes.show');
