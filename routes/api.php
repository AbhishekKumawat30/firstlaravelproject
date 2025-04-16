<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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
Route::match(['get','post' ],'schoolToken/{id}', 'Api\ApiController@schoolToken');
Route::match(['get','post','update'],'checkSoftwareLock/{id}', 'Api\ApiController@checkSoftwareLock');
Route::match(['get','post','update'],'testschoolToken/{id}', 'Api\ApiController@testschoolToken');
Route::match(['get','post','update'],'checkSchoolToken/{id}', 'Api\ApiController@checkSchoolToken');
Route::match(['get','post','update'],'checkInstallation/{id}', 'Api\ApiController@checkInstallation');
Route::match(['get','post','update'],'sendInstallationToken/{id}', 'Api\ApiController@sendInstallationToken');
Route::match(['get','post','update'],'destroySchoolToken/{id}', 'Api\ApiController@destroySchoolToken');
Route::match(['get','post','update'],'getClientData', 'Api\ApiController@getClientData');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//NewsController 
Route::post('getRandomNewsFromLastSixMonths', [ApiController::class, 'getRandomNewsFromLastSixMonths']);
Route::get('getNews', [ApiController::class, 'getNews']);

//Setting
Route::get('getSetting', [ApiController::class, 'getSetting']);

//Banner Slider
Route::post('getBanners', [ApiController::class, 'getBanners']);

//State
Route::get('getState', [ApiController::class, 'getState']);

//City
Route::post('getCity', [ApiController::class, 'getCity']);

//Locality
Route::post('getLocality', [ApiController::class, 'getLocality']);

//NewsLetter
Route::post('subscribeNewsLetter', [ApiController::class, 'subscribeNewsLetter']);
Route::post('unSubscribeNewsLetter', [ApiController::class, 'unSubscribeNewsLetter']);

//Users, Sellers, and othe roles
Route::get('recommendedSellers', [ApiController::class, 'recommendedSellers']);

//Property and Projects
Route::get('getTopProjects', [ApiController::class, 'getTopProjects']);
Route::get('getFeaturedProjects', [ApiController::class, 'getFeaturedProjects']);


