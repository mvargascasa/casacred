<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PropertyController;
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
Route::get('/listingscsv', [ApiController::class, 'listingscsv']);
Route::group(["middleware" => "apikey.validate"], function(){
    Route::get('/getproperties', [ApiController::class, 'getproperties']);
    Route::get('/availableprop', [ApiController::class, 'getavailableproperties']);
    Route::get('/notifications', [ApiController::class, 'getnotifications']);
    Route::get('/projects', [ApiController::class, 'getprojectlistings']);
    Route::get('/project/{slug}', [ApiController::class, 'getlistingbyslug']);
    Route::get('/list-activated-properties', [ApiController::class, 'listActivatedProperties']);
    Route::get('/get-property-by-slug/{slug}', [ApiController::class, 'getPropertieBySlug']);
    Route::get('/type-of-property/{type}', [ApiController::class, 'getPropertyType']);
    Route::get('/transaction-property-type/{transaction}', [ApiController::class, 'getTransactionType']);
    
    Route::get('/get-details', [ApiController::class, 'getDetails']);
    Route::get('/get-services', [ApiController::class, 'getServices']);
    Route::get('/get-general-characteristics', [ApiController::class, 'getGeneralCharacteristics']);
    Route::get('/get-environments', [ApiController::class, 'getEnvironments']);
    
    Route::get('/property/{id}', [ApiController::class, 'propertyById']);
    Route::get('/propertybycode/{code}', [ApiController::class, 'propertyByCode']);

    Route::get('/updated-property/{property_code}', [ApiController::class, 'updatedPropertie']);

    //Route::get('/list-properties', [ApiController::class, 'listPropertiesHousing']);
});

Route::get('/propertys/list', [PropertyController::class, 'search'])->name('search.property');

