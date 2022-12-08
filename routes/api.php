<?php

use App\Http\Controllers\ApiController;
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

Route::post('/sendlead', [ApiController::class, 'sendlead']);
Route::get('/getproperties', [ApiController::class, 'getproperties']);
Route::get('/listingscsv', [ApiController::class, 'listingscsv']);
Route::group(["middleware" => "apikey.validate"], function(){
    Route::get('/notifications', [ApiController::class, 'getnotifications']);
    Route::get('/projects', [ApiController::class, 'getprojectlistings']);
    Route::get('/project/{slug}', [ApiController::class, 'getlistingbyslug']);
});

