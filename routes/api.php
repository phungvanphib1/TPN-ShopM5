<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    //auth
    Route::post('/login-customer', [ApiAuthController::class, 'login']);
    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/change-pass', [ApiAuthController::class, 'changePassWord']);
    Route::post('/change-pass-mail', [UserController::class, 'takePassword']);
    Route::get('auth/profile', [ApiAuthController::class, 'userProfile']);
    //Cart
    Route::get('list-cart', [CartController::class, 'getAllCart']);
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart']);
    Route::get('remove-to-cart/{id}', [CartController::class, 'removeToCart']);
    Route::get('remove-all-cart', [CartController::class, 'removeAllCart']);
    Route::get('update-cart/{id}/{quantity}', [CartController::class, 'updateCart']);

    Route::get('list-cart-by-like', [CartController::class, 'getAllCartByLike']);
    Route::get('add-to-cart-by-like/{id}', [CartController::class, 'addToCartBylike']);
    Route::get('remove-to-cart-by-like/{id}', [CartController::class, 'removeToCartBylike']);
    //Product
    Route::get('product_list',[ApiProductController::class,'product_list']);
    Route::get('product_list/search',[ApiProductController::class,'search']);
    Route::get('product_detail/{id}',[ApiProductController::class,'product_detail']);
    Route::get('product_images/{id}',[ApiProductController::class,'image_detail']);
    Route::get('category_list',[ApiProductController::class,'category_list']);
    Route::get('trendingProduct',[ApiProductController::class,'trendingProduct']);
    Route::get('productnew',[ApiProductController::class,'productnew']);
    Route::get('product_list/search',[ApiProductController::class,'search']);

    //order
    Route::get('order_create', [ApiOrderController::class, 'create']);
    Route::post('order_store', [ApiOrderController::class, 'store']);


