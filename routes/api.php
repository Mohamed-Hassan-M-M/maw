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

Route::post('/login', 'AuthController@login');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('driver')->middleware(['auth:api'])->namespace('Driver')->group(function () {

    Route::get('/trips', 'TripController@index')->name('trips.index');
    Route::put('/trips/{trip}/update_status', 'TripController@updateStatus')->name('trips.update_status');
    Route::put('/trips/{trip}/upload_on_loading_image', 'TripController@uploadOnLoadingImage')->name('trips.upload_on_loading_image');
    Route::put('/trips/{trip}/upload_completed_image', 'TripController@uploadCompletedImage')->name('trips.upload_completed_image');

    Route::post('/locations/{driver}', 'LocationController@store')->name('drivers.locations');

    Route::post('/profile', 'ProfileController@store')->name('drivers.profile');

});