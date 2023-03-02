<?php

use App\Http\Controllers\API\V1\CustomerController;
use App\Http\Controllers\API\V1\FoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\InvoiceController;
use \App\Http\Controllers\API\V1\FoodCategoryController;
//use Illuminate\Http\Request;

Route::post('auth/login', [AuthController::class, 'loginUser']);

Route::post('auth/register', [AuthController::class, 'registerUser']);

Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\API\V1',
    'middleware' => 'auth:sanctum'
], function(){
    Route::apiResource('customers', CustomerController::class);

    Route::apiResource('invoices', InvoiceController::class);

    Route::apiResource('food-categories', FoodCategoryController::class);

    Route::apiResource('foods', FoodController::class);

    Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
