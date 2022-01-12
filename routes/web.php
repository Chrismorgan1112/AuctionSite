<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// So the route can accept the / or /home
Route::get('/{param?}', [HomeController::class, "index"])->where('param', 'home')->name('home');

// Authentication
Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::post('/api/register', [RegisterController::class, "val_and_store"]);

Route::get('/login',  [LoginController::class, "index"])->middleware('guest');
Route::post('/login',  [LoginController::class, "login"]);

Route::get('/logout', [LoginController::class, "logout"])->name('logout');

// Product Detail
Route::get('/product/{product_id}',[ProductController::class, 'show'])->name('productDetail');

// Update Profile
Route::get('/update-profile/{user_id}', [UpdateProfileController::class, 'index'])->middleware('customer');
Route::post('/update-profile/{user_id}', [UpdateProfileController::class, 'update'])->middleware('customer');

// Search Page
Route::get('/search-page', [SearchController::class, 'index']);
Route::get('/search-product', [SearchController::class, 'searching']);

// Cart
Route::get('/cart/{user_id}',[CartController::class, 'index'])->middleware('customer');
Route::post('/checkout', [CartController::class, 'checkoutTransaction'])->middleware('customer');

// Admin Only
Route::get('/insert-product', [ProductController::class, "indexInsert"])->middleware('admin');
Route::post('/api/insert-product', [ProductController::class, "store"])->middleware('admin');

Route::get('/update-product/{product_id}', [ProductController::class, "indexUpdate"])->middleware('admin')->name('updateProductGet');
Route::post('/api/update-product/{product_id}', [ProductController::class, "update"])->middleware('admin')->name('updateProductPost');

Route::get('/delete-product/{product_id}',[ProductController::class, "delete"])->middleware('admin');

Route::get('/manage-user', [UserController::class, "index"])->middleware('admin');
Route::delete('/delete-user/{id}', [UserController::class, "delete"])->middleware('admin');

// transaction
Route::get('/transaction',[TransactionController::class, 'index'])->middleware('customer');
Route::post('/check-detail/{transaction_id}',[TransactionController::class, 'trans_detail'])->middleware('customer');

//bid
Route::get('/bid/{product_id}',[BidController::class, 'bid_item'])->middleware('customer');
Route::get('bid-item-list',[BidController::class, 'bid_item_list'])->middleware('customer');
Route::delete('/delete-item-bid/{transaction_id}', [BidController::class, 'delete_bid_item'])->middleware('customer');