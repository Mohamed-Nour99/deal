<?php

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


Route::group(['middleware' => 'auth:api'], function () {
	###CRUD_PLACEHOLDER###
});
Route::resource('/deals','DealController');
Route::resource('/deal_percentages','DealPercentageController');
Route::get('/get_deal_percentage','SAC\GetDealPercentageController');

