<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'showRegister'])->name('register.get');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.get');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(["auth"])->group(function () {
    Route::get('/home', [InfoController::class , 'index'])->name('home');

    Route::delete('/delete', [InfoController::class , 'delete'])->name('delete');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
