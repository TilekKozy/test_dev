<?php

use App\Http\Controllers\Api\OperationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
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
Route::prefix('v1')->group(static function () {
    Route::controller(UserController::class)->group(static function () {
        Route::post('login', 'login')->name('login');
        Route::post('register', 'register');
    });

    Route::middleware('auth:api')->group(static function () {
        Route::post('operation/buy', [OperationController::class , 'buy']);
        Route::apiResource('product', ProductController::class);
        Route::apiResource('operation', OperationController::class)->only('index');
    });
});

