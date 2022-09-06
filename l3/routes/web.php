<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\dashboard\dashboard;
use App\Http\Controllers\category\categoryController;
use App\Http\Controllers\product\productController;
use App\Models\Category;

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
})->name('home');

Route::get('register', [authController::class, 'register']);
Route::post('register', [authController::class, 'postRegister'])->name('register');

Route::get('login', [authController::class, 'login']);
Route::post('login', [authController::class, 'postlogin'])->name('login');

Route::get('dashboard', [dashboard::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('logout', [authController::class, 'logout'])->name('logout');

Route::get('categories', [categoryController::class, 'categories'])->name('categories')->middleware('auth');
Route::get('addCategory', [categoryController::class, 'addCategory'])->name('addCategory')->middleware('auth');
Route::post('addCategory', [categoryController::class, 'postCategory'])->name('postCategory')->middleware('auth');
Route::get('editCategory{id}', [categoryController::class, 'editCategory'])->name('editCategory')->middleware('auth');
Route::post('editCategory{id}', [categoryController::class, 'updateCategory'])->name('updateCategory')->middleware('auth');
Route::get('deleteCategory{id}', [categoryController::class, 'destroy'])->name('deleteCategory')->middleware('auth');

Route::get('addProduct', [productController::class, 'addProduct'])->name('addProduct')->middleware('auth');
Route::post('addProduct', [productController::class, 'postProduct'])->name('postProduct')->middleware('auth');
Route::get('products', [productController::class, 'products'])->name('products')->middleware('auth');
Route::get('editProduct{id}', [productController::class, 'editProduct'])->name('editProduct')->middleware('auth');
Route::post('updateProduct{id}', [productController::class, 'updateProduct'])->name('updateProduct')->middleware('auth');
Route::get('deleteProduct{id}', [ProductController::class, 'destroy'])->name('deleteProduct')->middleware('auth');


Route::get('export', [productController::class, 'export'])->name('export');
Route::get('import', [authController::class, 'importExportView']);
Route::post('import', [authController::class, 'import'])->name('import');




