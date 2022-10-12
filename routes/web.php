<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
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

// ## Product routes
// All products
Route::get('/', [ProductController::class, 'index']);

// Show add product Form
Route::get('/product/create', [ProductController::class, 'create']);

// Store product Data
Route::post('/product/create', [ProductController::class, 'store']);

// Delete product
Route::delete('/product/{product}',[ProductController::class, 'distroy']);

// Show edit product Form
Route::get('/product/{product}/edit', [ProductController::class, 'edit']);

// Single product
Route::get('/product/{product}', [ProductController::class, 'show']);

// Update product
Route::put('/product/{product}',[ProductController::class, 'update']);
// ## End product routes

// ## User routes 
// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/user', [UserController::class, 'store']);

// Log user out
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/user/authenticate',[UserController::class, 'authenticate']);
// ## End user routes

// ## Menu routes
// Menu listing
Route::get('/admin/menu', [MenuController::class, 'index'])->middleware('auth');

// Show add menu Form
Route::get('/admin/menu/create', [MenuController::class, 'create'])->middleware('auth');

// Store menu Data
Route::post('/admin/menu/create', [MenuController::class, 'store'])->middleware('auth');

// Delete menu
Route::delete('/admin/menu/{menu}',[MenuController::class, 'distroy'])->middleware('auth');

// Show edit menu Form
Route::get('/admin/menu/{menu}/edit', [MenuController::class, 'edit'])->middleware('auth');

// Update menu
Route::put('/admin/menu/{menu}',[MenuController::class, 'update']);
// ## End menu routes
