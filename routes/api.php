<?php

use App\Http\Controllers\Api\ApiProductController;
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
    Route::get('product_list',[ApiProductController::class,'product_list']);
    Route::get('product_list/search',[ApiProductController::class,'search']);
    Route::get('product_detail/{id}',[ApiProductController::class,'product_detail']);
    Route::get('product_images/{id}',[ApiProductController::class,'image_detail']);
    Route::get('category_list',[ApiProductController::class,'category_list']);
    Route::get('trendingProduct',[ApiProductController::class,'trendingProduct']);
    Route::get('productnew',[ApiProductController::class,'productnew']);
