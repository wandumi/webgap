<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\OrderController;
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
    return view('frontend.index');
});

/**
* Backend Routes
 */
Route::get('dashboard', function () {
    return view('backend.index');
});

Route::prefix('admin')->group(function () {
    Route::resource("products", ProductController::class);
    Route::resource("links", LinkController::class);
    Route::resource("orders", OrderController::class);
});
