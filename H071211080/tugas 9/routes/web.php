<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;

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

// Route::get('/', [Dashboard::class, 'index']);

Route::get('/p', function () {
    return view('product');
});

Route::get('/s', [SellerController::class, "index"]);
Route::post('/s', [SellerController::class, "store"]);
Route::get('/s/delete/{id}', [SellerController::class, "Delete"]);
Route::get('/s/edit/{id}', [SellerController::class, "edit"]);
Route::post('/s/edit/{id}', [SellerController::class, "update"]);


Route::get('/c', [CategoryController::class, "index"]);
Route::post('/c', [CategoryController::class, "store"]);
Route::get('/c/delete/{id}', [CategoryController::class, "Delete"]);
Route::get('/c/edit/{id}', [CategoryController::class, "edit"]);
Route::post('/c/edit/{id}', [CategoryController::class, "update"]);

Route::get('/pe', [PermissionController::class, "index"]);
Route::post('/pe', [PermissionController::class, "store"]);
Route::get('/pe/delete/{id}', [PermissionController::class, "Delete"]);
Route::get('/pe/edit/{id}', [PermissionController::class, "edit"]);
Route::post('/pe/edit/{id}', [PermissionController::class, "update"]);

Route::get('/', [ProductController::class, "index"]);
Route::post('/', [ProductController::class, "store"]);
Route::get('/delete/{id}', [ProductController::class, "Delete"]);
Route::get('/edit/{id}', [ProductController::class, "edit"]);
Route::post('/edit/{id}', [ProductController::class, "update"]);


