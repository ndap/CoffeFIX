<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', [userController::class, 'landing'])->name('landing');

Route::get('/admin', [MenuController::class, 'index'])->name('admin.dashboard');
Route::resource('menus', MenuController::class);

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'store'])->name('register');

Route::delete('menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [userController::class, 'index'])->name('dashboard');

Route::get('/buy/{menu}', [OrderController::class, 'index'])->name('buy');

