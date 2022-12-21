<?php

use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboarController;

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\GroupController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UserController;

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





// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

Route::get('/takepassword', function(){return view('admin.Auth.takepassword');})->name('takepassword');
Route::post('posttakepassword', [UserController::class,'takePassword'])->name('posttakepassword');

Route::prefix('/')->middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboarController::class, 'index'])->name('dashboard.admin');

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
        Route::get('/exportExcel', [ProductController::class, 'exportExcel'])->name('products.exportExcel');
    });
    Route::resource('products', ProductController::class);

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
        Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
        Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
    });
    Route::prefix('customers')->group(function () {
    });
    Route::resource('customers', CustomerController::class);

    Route::prefix('users')->group(function () {
        Route::get('GetDistricts', [UserController::class, 'GetDistricts'])->name('user.GetDistricts');
        Route::get('getWards', [UserController::class, 'getWards'])->name('user.getWards');
        Route::post('updatePass/{id}', [UserController::class, 'change_password'])->name('user.change_password');
        Route::get('/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
        Route::put('/adminUpdatePass/{id}', [UserController::class, 'adminUpdatePass'])->name('user.adminUpdatePass');
    });
    Route::resource('users', UserController::class);
    //  Order
    Route::prefix('orders')->group(function () {
        Route::get('/exportExcel', [OrderController::class, 'exportExcel'])->name('orders.exportExcel');
    });
    Route::resource('orders', OrderController::class);
});
