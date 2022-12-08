<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/addProduct', [AdminController::class, 'addProduct']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cartproduct/{id}', [HomeController::class, 'remove_cartproduct']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
Route::post('/stripe/{totalprice}', [HomeController::class, 'stripePost' ])->name('stripe.post');
Route::get('/orders', [AdminController::class, 'show_all_orders']);
Route::get('/deliver/{id}', [AdminController::class, 'deliver']);
Route::get('/pdf/{id}', [AdminController::class, 'pdf']);
Route::get('phpinfo', function () {
    phpinfo();});
Route::get('/send_email/{id}', [AdminController::class, 'sendEmail']);
Route::post('/send_user_email/{id}', [AdminController::class, 'sendUserEmail']);
Route::get('/search_order', [AdminController::class, 'search_order']);






