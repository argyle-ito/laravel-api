<?php

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

Route::post('/projects',[App\Http\Controllers\API\AuthController::class,'register'])->middleware('auth:api');
Route::post('/auth', [App\Http\Controllers\API\AuthController::class,'login']);
Route::apiResource('api/ceo', 'App\Http\Controllers\API\CEOController')->middleware('auth:api');


    Route::get('UYZ99/conf', [App\Http\Controllers\API\ProjectController::class,'getSetting'])->middleware('auth:api');
    Route::put('UYZ99/conf', [App\Http\Controllers\API\ProjectController::class,'putSetting'])->middleware('auth:api');
    Route::post('UYZ99/jobs.json', [App\Http\Controllers\API\ProjectController::class,'updateGob'])->middleware('auth:api');
    Route::get('UYZ99/jobs', [App\Http\Controllers\API\ProjectController::class,'getGob'])->middleware('auth:api');
    Route::get('UYZ99/status', [App\Http\Controllers\API\ProjectController::class,'status'])->middleware('auth:api');
    Route::get('UYZ99/stats/2022/12', [App\Http\Controllers\API\ProjectController::class,'info'])->middleware('auth:api');

    Route::delete('PAB01', [App\Http\Controllers\API\ProjectController::class,'deleteProject'])->middleware('auth:api');
    Route::get('UYZ99/{filename}.csv', [App\Http\Controllers\API\ProjectController::class,'getCsv'])->middleware('auth:api');
    Route::put('UYZ99/{filename}.csv', [App\Http\Controllers\API\ProjectController::class,'postCsv'])->middleware('auth:api');
