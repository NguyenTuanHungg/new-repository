<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('product', [ProductController::class, 'index'])->name('admin');
    Route::post('create', [ProductController::class, 'create'])->name('insert');
    Route::get('add', [ProductController::class, 'add'])->name('add');
    Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    Route::get('edit/{id}', [ProductController::class, 'edits'])->name('edit');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('register', [AuthController::class, 'register_index'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('requestPassword');
    Route::post('/forgotPassword', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.reset');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('cart', [CartController::class, 'shopCart'])->name('cart');
Route::post('addPr', [CartController::class, 'addProduct'])->name('addProduct');
Route::delete('deleteCart/{id}', [CartController::class, 'removeProduct'])->name('deleteCart');
Route::get('searchPr', [HomeController::class, 'searchProducts'])->name('searchPr');
Route::get('/product/{id}', [DetailController::class, 'detail'])->name('product.show');
Route::get('/rating', [RatingController::class, 'rating'])->name('rating');
