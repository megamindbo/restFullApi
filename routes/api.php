<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('/country/index','Country\CountryController@index')->name('country');
//Route::post('/countrySave','Country\CountryController@save')->name('saveCountry');
//Route::put('country/{id}','Country\CountryController@update')->name('updateCountry');
//Route::delete('country/{$id}','Country\CountryController@delete')->name('deleteCountry');


Route::apiResource('country','Country\Country');

