<?php

use App\Http\Controllers\Api\EmployeeController;
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

    Route::apiResource('employees', App\Http\Controllers\Api\EmployeeController::class);
    Route::post('employees/store',[EmployeeController::class,'store']);
    Route::get('employee/delete/{id}',[EmployeeController::class,'destroy']);
    Route::get('employee/{id}/edit',[EmployeeController::class,'edit']);
    Route::put('employee/update/{id}',[EmployeeController::class,'update']);

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
