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
Route::get('/product/{product_id}', [ProductController::class, 'retrieveProductInfo'])->name('products.show');
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
        Route::get('products', [ProductController::class, 'index'])->name('roomView');
        Route::post('products/delete', [ProductController::class, 'delete']);
        Route::post('products/insert', [ProductController::class, 'insert']);
        Route::post('products/fetchData', [ProductController::class, 'fetchData']);
        Route::get('add', [ProductController::class, 'newProduct']);
        Route::get('transactions', [TransactionsController::class, 'index']);
        Route::post('transactions/GetAllTransactions', [TransactionsController::class, 'GetAllTransactions']);
        Route::post('transactions/GetNewTransactions', [TransactionsController::class, 'GetNewTransactions']);
        Route::post('transactions/getPaidOrders', [TransactionsController::class, 'getPaidOrders']);
        Route::post('transactions/GetInShipment', [TransactionsController::class, 'GetInShipment']);
        Route::post('transactions/GetCompleted', [TransactionsController::class, 'GetCompleted']);
        Route::post('transactions/GetCanceled', [TransactionsController::class, 'GetCanceled']);
        Route::get('modify', [modifyController::class, 'index']);
    });
});
