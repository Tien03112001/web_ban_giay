<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\Menu\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\MainController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/user/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/user/login', [LoginController::class, 'store']);
Route::get('admin/logout', [LoginController::class, 'logout']);
Route::get('admin/user/register', [LoginController::class, 'getformregister'])->name('register');
Route::post('admin/user/register', [LoginController::class, 'register']);
Route::get('admin/changepassword', [LoginController::class, 'getformchangepassword']);
Route::post('admin/changepassword', [LoginController::class, 'changePassword']);
Route::get('/', [MainController::class, 'CustomerIndex'])->name('HomeCustomer');
Route::get('/product', [MainController::class, 'ProductList']);
Route::get('/product/{product}', [MainController::class, 'ProductDetail']);
Route::post('/addtocart', [CartController::class, 'create']);
Route::get('/menu/{menu}', [ProductController::class, 'ProductByMenu']);
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/updateCart', [CartController::class, 'update']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/checkout', [CartController::class, 'complete_checkout']);

Route::get('/filter_price_product', [ProductController::class, 'filter_price_product']);
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('main', [MainController::class, 'index'])->name('admin');

        #MENU
        Route::prefix('menu')->group(function () {
            Route::get('/add', [MenuController::class, 'add']);
            Route::post('/add', [MenuController::class, 'store']);
            Route::get('/list', [MenuController::class, 'index']);
            Route::DELETE('/destroy', [MenuController::class, 'destroy']);
            Route::get('/edit/{menu}', [MenuController::class, 'show']);
            Route::post('/edit/{menu}', [MenuController::class, 'update']);
        });
        #PRODUCT
        Route::prefix('product')->group(function () {
            Route::get('/add', [ProductController::class, 'create']);
            Route::post('/add', [ProductController::class, 'store']);
            Route::get('/list', [ProductController::class, 'index']);
            Route::get('/edit/{menu}', [ProductController::class, 'show']);
            Route::post('/edit/{menu}', [ProductController::class, 'update']);
        });
        #ORDER
        Route::prefix('order')->group(function () {
            Route::get('/list', [OrderController::class, 'show']);
            Route::get('/edit/{customer}', [OrderController::class, 'edit']);
            Route::post('/edit/{customer}', [OrderController::class, 'update']);
        });
    });
});
