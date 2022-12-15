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
// ------------------------Admin Routes ----------------------------
Route::middleware(['auth', 'admin'])->group(function () {
// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::post('/add_category', [AdminController::class, 'add_category'])->middleware('auth');
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware('auth');
    Route::get('/view_product', [AdminController::class, 'view_product'])->middleware('auth');
    Route::post('/addProduct', [AdminController::class, 'addProduct'])->middleware('auth');
    Route::get('/show_product', [AdminController::class, 'show_product'])->middleware('auth');
    Route::get('/view_category', [AdminController::class, 'view_category'])->middleware('auth','admin');

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->middleware('auth');
Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->middleware('auth');
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->middleware('auth');
Route::get('/orders', [AdminController::class, 'show_all_orders'])->middleware('auth');
Route::get('/deliver/{id}', [AdminController::class, 'deliver'])->middleware('auth');
Route::get('/pdf/{id}', [AdminController::class, 'pdf'])->middleware('auth');
Route::get('/send_email/{id}', [AdminController::class, 'sendEmail'])->middleware('auth');
Route::post('/send_user_email/{id}', [AdminController::class, 'sendUserEmail'])->middleware('auth');
Route::get('/search_order', [AdminController::class, 'search_order'])->middleware('auth');
    Route::get('/redirect', [HomeController::class, 'redirect']);
});




//------------------------Home/User Routes----------------------------------


Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart'])->middleware('auth');
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cartproduct/{id}', [HomeController::class, 'remove_cartproduct']);
Route::get('/checkout', [HomeController::class, 'checkout'])->middleware('auth');
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe'])->middleware('auth');
Route::post('/stripe/{totalprice}', [HomeController::class, 'stripePost' ])->name('stripe.post')->middleware('auth');
;
Route::get('phpinfo', function () {
    phpinfo();});

Route::get('/show_orders', [HomeController::class, 'show_orders' ])->middleware('auth');
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order' ])->middleware('auth');
Route::get('/product_search', [HomeController::class, 'product_search' ]);







