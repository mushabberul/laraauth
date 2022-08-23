<?php

use App\Http\Controllers\CustomRegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register',[CustomRegisterController::class,'showFormRegister'])->name('register');
Route::post('register',[CustomRegisterController::class,'registerUser'])->name('register.store');

Route::get('login',[CustomRegisterController::class,'showFormLogin'])->name('login');
Route::post('login',[CustomRegisterController::class,'showUser'])->name('login.store');


Route::post('logout',[CustomRegisterController::class,'logout'])->name('logout');
