<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
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
    return view('admin.dashboar');
})->name('dashboard.admin');

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::put('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/forcedelete/{id}', [CategoryController::class, 'forcedelete'])->name('category.forcedelete');
});

Route::prefix('products')->group(function () {
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('product.destroy');
    Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::put('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
    Route::delete('/forcedelete/{id}', [ProductController::class, 'forcedelete'])->name('product.forcedelete');
});
Route::resource('products',ProductController::class);

