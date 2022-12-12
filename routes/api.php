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

Route::post('/projects',[App\Http\Controllers\API\AuthController::class,'register']);
Route::post('/auth', [App\Http\Controllers\API\AuthController::class,'login']);

Route::get('ceo', [App\Http\Controllers\API\CEOController::class,'index'])->middleware('auth:api');
Route::get('UYZ99/conf', [App\Http\Controllers\API\ProjectController::class,'getSetting']);
Route::put('UYZ99/conf', [App\Http\Controllers\API\ProjectController::class,'putSetting']);
Route::post('UYZ99/jobs.json', [App\Http\Controllers\API\ProjectController::class,'updateGob']);
Route::get('UYZ99/jobs', [App\Http\Controllers\API\ProjectController::class,'getGob']);
Route::get('UYZ99/status', [App\Http\Controllers\API\ProjectController::class,'status']);
Route::get('UYZ99/stats/{year}/{month}', [App\Http\Controllers\API\ProjectController::class,'info']);
Route::get('UYZ99/{filename}.csv', [App\Http\Controllers\API\ProjectController::class,'getCsv']);
Route::post('UYZ99/{filename}.csv', [App\Http\Controllers\API\ProjectController::class,'postCsv']);
Route::delete('PAB01', [App\Http\Controllers\API\ProjectController::class,'deleteProject']);
