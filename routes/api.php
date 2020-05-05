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

Route::resource('/categories', 'CategoryController');

Route::get('/services/{categoryId?}', 'ServiceController');

Route::get('/lists', 'ServiceController@list');

Route::get('/provider-services/{providerId?}', 'HandyController@providerServices');

Route::get('/provider-profile/{providerId?}', 'HandyController@providerProfile');

Route::get('/get-users/{id?}', 'Auth\AuthController@getUsers');

Route::get('/get-providers/{id?}', 'Auth\AuthController@getProviders');

Route::get('/auth/user', 'Auth\AuthController@user');

Route::get('/auth/provider', 'Auth\AuthController@provider');

Route::post('new-booking', 'BookingController@store');

Route::get('provider-bookings/{userId}', 'BookingController@show');

Route::get('get-jobs/{providerId}', 'HandyController@getAllJobs');

Route::get('get-pending-jobs/{providerId}', 'HandyController@getPendingJobs');

Route::get('get-accepted-jobs/{providerId}', 'HandyController@getAcceptedJobs');

Route::get('job-details/{providerId}', 'HandyController@jobDetails');

Route::get('/cancel/{providerId}', 'HandyController@cancelBooking');

Route::get('/all-jobs/{providerId}', 'HandyController@allJobs');

Route::get('upcoming-jobs/{userId}', 'HandyController@upcomingJobs');

Route::get('past-jobs/{userId}', 'HandyController@pastJobs');

Route::get('/job-status-accept/{providerId}', 'HandyController@acceptJobStatus');

Route::post('job', 'HandyController@storeJobs');

Route::get('/update-start-job/{providerId}', 'HandyController@updateStartJob');

Route::get('/update-complete-job/{providerId}', 'HandyController@updateCompleteJob');

Route::middleware('auth:api')->get('/users', function (Request $request) {
	return $request->user();
});

Route::middleware('auth:api')->get('/providers', function (Request $request) {
    return $request->provider();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');

    Route::post('login', 'Auth\AuthController@providerLogin')->name('providerLogin');
    Route::post('register', 'Auth\AuthController@registerProvider');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');

        Route::get('logout', 'Auth\AuthController@providerLogout');
        Route::get('provider', 'Auth\AuthController@provider');
    });
});



