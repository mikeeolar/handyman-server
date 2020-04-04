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

// Route::middleware('auth:api')->get('/users', function (Request $request) {
//     return $request->users();
// });


Route::resource('/categories', 'CategoryController');

Route::get('/services/{categoryId?}', 'ServiceController');

Route::get('/provider-services/{providerId?}', 'HandyController@providerServices');

Route::get('/provider-profile/{providerId?}', 'HandyController@providerProfile');

Route::get('/get-users/{id?}', 'Auth\AuthController@getUsers');

Route::get('/auth/user', 'Auth\AuthController@user');

Route::post('new-booking', 'BookingController@store');

Route::get('provider-bookings/{userId}', 'BookingController@show');

Route::get('job-details/{providerId}', 'HandyController@jobDetails');

Route::get('/cancel/{providerId}', 'HandyController@cancelBooking');

Route::middleware('auth:api')->get('/users', function (Request $request) {
	return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
});


