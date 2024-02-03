<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
// Authentication
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('throttle:3,1');
    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register')->middleware('throttle:3,1');
});

Route::get('/', [HomeController::class, 'dashboard_view'])->name('/');
