<?php

use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/about', function () {
        return view('modules.about');
    })->name('about');

    Route::middleware([CheckRole::class . ':Administrador'])->group(function () {
        Route::get('/user-management', [UserController::class, 'index'])->name('user-management');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.post');
    });

    Route::middleware([CheckRole::class . ':Administrador,Técnico'])->group(function () {
        Route::get('/maintenance', function () {
            return view('modules.maintenance');
        })->name('maintenance');
    });

    Route::middleware([CheckRole::class . ':Administrador,Contable'])->group(function () {
        Route::get('/movements', function () {
            return view('modules.movements');
        })->name('movements');
    });

    Route::middleware([CheckRole::class . ':Administrador,Contable'])->group(function () {
        Route::get('/reports', function () {
            return view('modules.reports');
        })->name('reports');
    });
});

require __DIR__ . '/auth.php';