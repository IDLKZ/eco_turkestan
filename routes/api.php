<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\AreaController;
use \App\Http\Controllers\Api\PlaceController;
use \App\Http\Controllers\Api\MarkerController;
use \App\Http\Controllers\Api\SystemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group([],function (){
    Route::get("",function (){
        return "It works!";
    });
   Route::get("areas-all",[AreaController::class,"getAllArea"]);
   Route::get("places-all",[PlaceController::class,"getAllPlace"]);
   Route::get("markers-all",[MarkerController::class,"getAllMarker"]);
   Route::get("get-system-all",[SystemController::class,"getAllSystemData"]);
});
