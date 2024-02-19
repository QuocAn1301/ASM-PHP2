<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\AccountController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CustomerController;
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
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product', [HomeController::class, 'product'])->name('home.product');

Route::group(['middleware' => 'admin'], function () {
    
    
    
    Route::resource('admin/products', ProductsController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/customers', CustomerController::class);
    
    
});

Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');



Route::group(['prefix' => 'account'], function () {
    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/login', [AccountController::class, 'check_login']);

    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class, 'check_register']);
    Route::get('/veryfy-account/{email}', [AccountController::class, 'veryfy'])->name('account.veryfy');

    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');

    Route::group(['middleware' => 'customer'], function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::post('/profile', [AccountController::class, 'check_profile']);


        Route::get('/change_password', [AccountController::class, 'change_password'])->name('account.change_password');
        Route::post('/change_password', [AccountController::class, 'check_change_password']);
    });

    Route::get('/forgot_password', [AccountController::class, 'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot_password', [AccountController::class, 'check_forgot_password']);


    Route::get('/reset_password/{token}', [AccountController::class, 'reset_password'])->name('account.reset_password');
    Route::post('/reset_password/{token}', [AccountController::class, 'check_reset_password']);

});


Route::group(['prefix' => 'cart','middleware' => 'customer'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::match(['get', 'post', 'put'],'/update/{product}', [CartController::class, 'update'])->name('cart.update');

    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    
});