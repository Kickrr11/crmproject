<?php


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

App::bind('League\Fractal\Serializer\SerializerAbstract', 'League\Fractal\Serializer\DataArraySerializer');

Route::post('authenticate', 'Api\ApiAuthenticateController@authenticate');
Route::post('createRegistration', 'Api\ApiAuthenticateController@createRegistration');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('accounts', 'Api\ApiAccountController');
    Route::resource('accounts.notes', 'Api\ApiAccountNoteController');
    Route::resource('accounts.contacts', 'Api\ApiAccountContactController');
    Route::resource('notes', 'Api\ApiNoteController');
    Route::resource('contacts', 'Api\ApiContactController');
    Route::resource('users', 'Api\ApiUsersController');
    Route::resource('countries', 'Api\ApiCountryController');
    Route::resource('countries.accounts', 'Api\ApiCountryAccountController');
});
