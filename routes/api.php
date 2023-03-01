<?php

use App\Http\Controllers\API\V1\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\InvoiceController;
//use Illuminate\Http\Request;

Route::post('auth/login', [AuthController::class, 'loginUser']);

Route::post('auth/register', [AuthController::class, 'registerUser']);

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1', 'middleware' => 'auth:sanctum'], function(){
    Route::apiResource('customers', CustomerController::class);

    Route::apiResource('invoices', InvoiceController::class);

    Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
