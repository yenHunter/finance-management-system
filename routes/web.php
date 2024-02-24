<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
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
    Route::get('recovery', [AuthController::class, 'recovery_view'])->name('recovery');
    Route::post('recovery', [AuthController::class, 'recovery'])->name('recovery');
});
Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', 'dashboard');
    Route::get('dashboard', [HomeController::class, 'dashboard_view'])->name('dashboard');
    Route::get('income-list', [IncomeController::class, 'income_list_view'])->name('income-list');
    Route::get('income-create', [IncomeController::class, 'income_create_view'])->name('income-create');
    Route::post('income-create', [IncomeController::class, 'income_create_store'])->name('income-create');
    Route::get('expense-list', [ExpenseController::class, 'expense_list_view'])->name('expense-list');
    Route::get('expense-create', [ExpenseController::class, 'expense_create_view'])->name('expense-create');
    Route::get('expense-head', [ExpenseController::class, 'expense_head_view'])->name('expense-head');
    Route::get('report', [ReportController::class, 'report_view'])->name('report');
    Route::get('balance-sheet', [ReportController::class, 'balance_sheet_report'])->name('balance-sheet');
    Route::get('genPDF', [UserController::class, 'genPDF'])->name('genPDF');
    Route::get('user-list', [UserController::class, 'user_list_view'])->name('user-list');
    Route::get('bank-list', [SettingsController::class, 'bank_list_view'])->name('bank-list');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
