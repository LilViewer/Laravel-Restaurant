<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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
Route::get('/',[HomeController::class,'glob'])->name('glob');
Route::get('/kontak',[HomeController::class,'kontak'])->name('kontak');
Route::get('/katalog',[HomeController::class,'katalog'])->name('katalog');

Route::get('/register',[HomeController::class,'register'])->name('auth.register');
Route::get('/login',[HomeController::class,'login'])->name('auth.login');
Route::get('/logount',[HomeController::class,'logout'])->name('logout');

Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/register',[RegisterController::class,'register'])->name('register');
//Route::get('/',[HomeController::class,'about']);
Route::get('/about',[HomeController::class,'about'])->name('about');

Route::get('/basket/index',[BasketController::class,'index'])->name('basket.index');

Route::post('/basket/add/{id}',[BasketController::class,'add'])->name('basket.add');
Route::put('/basket/index/{id}',[BasketController::class,'Plusbasket'])->name('Plusbasket');
Route::delete('/basket/index',[BasketController::class,'Deletedbasket'])->name('Deletedbasket');
Route::patch('/basket/index/{id}',[BasketController::class,'Minusbasket'])->name('Minusbasket');
Route::post('/basket/index}',[BasketController::class,'OrderProduct'])->name('OrderProduct');

Route::middleware(['auth','role:1'])->prefix('admin')->group(function (){
    Route::get('/home',[HomeController::class,'Adminindex'])->name('Adminindex');
    Route::resource('/products',ProductController::class);
    Route::resource('/categories',CategoriController::class);
});