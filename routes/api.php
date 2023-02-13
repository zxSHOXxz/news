<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\ApiUserAuthController;


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

Route::apiResource('cities' , CityController::class);

Route::prefix('auth')->group(function(){
    Route::post('register' , [ApiUserAuthController::class , 'register']);
    Route::post('login' , [ApiUserAuthController::class , 'login']);
    Route::post('forget' , [ApiUserAuthController::class , 'forgetPassword']);
    Route::post('reset' , [ApiUserAuthController::class , 'resetPassword']);

});

Route::prefix('auth')->middleware('auth:admin-api')->group(function(){
    Route::get('logout' , [ApiUserAuthController::class , 'logout']);

});
