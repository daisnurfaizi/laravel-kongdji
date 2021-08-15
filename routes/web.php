<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'customer'])->name('customer');
Route::get('/produk', [HomeController::class, 'customerProduk'])->name('customer-produk');
Route::get('/admin', [AuthController::class, 'showFormLogin'])->name('admin');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::get('Franchise/{id}', [FranchiseController::class, 'index'])->name('franchise');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('Province', [RegionController::class, 'province'])->name('province');
    Route::get('District/{code}', [RegionController::class, 'district'])->name('district');
    Route::get('Subdistrict/{code}', [RegionController::class, 'subdistrict'])->name('subdistrict');
    Route::get('Village/{code}', [RegionController::class, 'vilage'])->name('vilage');
    Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('content', [HomeController::class, 'content'])->name('content');
    Route::get('updateContent/{id}', [ContentController::class, 'edit']);
    Route::get('Product', [ProductController::class, 'index'])->name('dataproduk');
    Route::get('UpdateProduct/{id}', [ProductController::class, 'edit'])->name('updateproduk');
    Route::get('insertproduct', [ProductController::class, 'createproduct'])->name('insertproduct');
    // Route::resource('updateHalaman', [ContentController::class, 'update']);
    Route::get('User', [UserController::class, 'index'])->name('showUser');
    Route::get('ListFranchise', [FranchiseController::class, 'showFranchise'])->name('listfranchise');
    Route::resource('UserAction', UserController::class);
    Route::resource('FranchiseAction', FranchiseController::class);
    Route::resource('updateHalaman', ContentController::class);
    Route::resource('Produk', ProductController::class);
    Route::get('RegisterFranchise', [FranchiseController::class, 'showFormFranchise'])->name('RegisFranchise');
});

// Route::get('/', function () {
//     return view('welcome');
// });
