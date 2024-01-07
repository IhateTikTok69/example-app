<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginCrontroller;
use App\Http\Controllers\modifyController;
use App\Http\Controllers\NewRoom;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\TransactionsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('home', []);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login/', [LoginCrontroller::class, 'index'])->name('adminLogin');
    Route::post('login/', [LoginCrontroller::class, 'authenticate']);
    Route::post('logout/', [LoginCrontroller::class, 'logout']);
    Route::get('/', [AdminController::class, 'index']);
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('adminDashboard');
        Route::post('dashboard/getSales', [AdminController::class, 'getSales'])->name('dashboard.getSales');
        Route::post('dashboard/getRevenue', [AdminController::class, 'getRevenue'])->name('dashboard.getRevenue');
        Route::post('dashboard/getRegister', [AdminController::class, 'getRegister'])->name('dashboard.getRegister');
        Route::get('rooms', [ProductController::class, 'index'])->name('roomView');
        Route::post('rooms/delete', [ProductController::class, 'delete']);
        Route::post('rooms/insert', [ProductController::class, 'insert']);
        Route::post('rooms/fetchData', [ProductController::class, 'fetchData']);
        Route::get('add', [ProductController::class, 'NewRoom']);
        Route::get('transactions', [TransactionsController::class, 'index']);
        Route::get('modify', [modifyController::class, 'index']);
    });
});
