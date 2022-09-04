<?php

use App\Models\Product;
use App\Mail\ProductCreateMarkdown;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomRegisterController;

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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/', function () {
    Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

    return view('welcome');
});
// Auth::routes();


Route::get('register',[CustomRegisterController::class,'showFormRegister'])->name('register');
Route::post('register',[CustomRegisterController::class,'registerUser'])->name('register.store');

Route::get('login',[CustomRegisterController::class,'showFormLogin'])->name('login');

Route::post('login',[CustomRegisterController::class,'showUser'])->name('login.store');

Route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/home', [HomeController::class, 'userList'])->name('user.store');
    Route::post('logout',[CustomRegisterController::class,'logout'])->name('logout');
});

Route::prefix('admin')->group(function(){
    Route::resource('/products',ProductController::class);
    Route::get('/products/{product_id}/restore',[ProductController::class, 'restore'])->name('products.restore');
    Route::get('/products/{product_id}/forcedelete',[ProductController::class, 'forceDelete'])->name('products.forcedelete');
});

// Route::get('mail-preview',function(){
//     $product = Product::find(7);

//     return new ProductCreateMarkdown($product);
// });
