<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', 'DashboardController@index');
        Route::get('/logout', 'AdminUserController@logout');
        Route::resource('/users', 'UserController');
        Route::resource('/providers', 'ProviderController');

        Route::get('/yes/{id}', 'ProviderController@verified')->name('provider.verified');
        Route::get('/no/{id}', 'ProviderController@notVerified')->name('provider.notVerified');
    });

    Route::get('/login', 'AdminUserController@index');
    Route::get('/register', 'AdminUserController@create');
    Route::post('/login', 'AdminUserController@login');
    Route::post('/register', 'AdminUserController@register');
});
