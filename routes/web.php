<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});
Route::get('logout', [LoginController::class,'logout']);
