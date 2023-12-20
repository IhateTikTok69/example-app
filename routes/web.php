<?php

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

Route::get('/', function () {
    return view('home');
});
Route::get('/dashboard', function () {
    return view('home', [
        "selected" => "dashboard"
    ]);
});
Route::get('/rooms', function () {
    return view('rooms', [
        "selected" => "rooms"
    ]);
});
Route::get('/add', function () {
    return view('add', [
        "selected" => "add"
    ]);
});
Route::get('/transactions', function () {
    return view('trans', [
        "selected" => "transactions"
    ]);
});
Route::get('/modify', function () {
    return view('modify', [
        "selected" => "modify"
    ]);
});
