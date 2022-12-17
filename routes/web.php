<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\GroupController;
use App\Http\Controllers\admin\UserController;
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
// group
Route::group(['prefix' => 'groups'], function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('/destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::get('/trash', [GroupController::class, 'trash'])->name('group.trash');
    Route::put('/restore/{id}', [GroupController::class, 'restore'])->name('group.restore');
    Route::delete('/forcedelete/{id}', [GroupController::class, 'forcedelete'])->name('group.forcedelete');
});
//  user
Route::prefix('users')->group(function () {
    Route::put('softDeletes/{id}',[UserController::class,'softDeletes'])->name('users.softDeletes');
    Route::get('trash',[UserController::class,'trash'])->name('users.trash');
    Route::put('restore/{id}',[UserController::class, 'restore'])->name('users.restore');
    Route::get('GetDistricts', [UserController::class, 'GetDistricts'])->name('user.GetDistricts');
    Route::get('getWards', [UserController::class, 'getWards'])->name('user.getWards');
});
Route::resource('users',UserController::class);
