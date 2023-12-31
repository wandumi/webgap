<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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
    return redirect('shop');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('shop/cart', [ShopController::class, 'cartShow']);
Route::resource('shop', ShopController::class);


/**
* Backend Routes
 */
Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('backend.dashboard');
    });
    Route::resource("products", ProductController::class);
    Route::resource("links", LinkController::class);
    Route::resource("orders", OrderController::class);
    Route::resource('users', UsersController::class);
});
