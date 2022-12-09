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

Route::get('ceo', [App\Http\Controllers\API\CEOController::class,'index']);
Route::get('{service_code}/conf', [App\Http\Controllers\API\ProjectController::class,'getSetting']);
