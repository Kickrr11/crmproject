<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    //
})->middleware('auth');

Route::any('login',
    ['as' => 'login',
    'uses'=> 'AuthController@login', ]

    );

Route::any('logged',
    ['as' => 'logged',
    'uses'=> 'AuthController@logged', ]

    );

    Route::any('registration',
    ['as' => 'registration',
    'uses'=> 'AuthController@registration', ]

    );

Route::any('regcreate',
    ['as' => 'regcreate',
    'uses'=> 'AuthController@createRegistration', ]

    );

Route::group(['middleware' => ['auth']], function () {
    Route::any('logout',
        ['as' => 'logout',
        'uses'=> 'AuthController@doLogout', ]

        );

    Route::any('dashboard',
        ['as' => 'dashboard',
        'uses'=> 'HomeController@hello', ]

        );

    Route::any('charts',
        ['as' => 'charts',
        'uses'=> 'HomeController@charts', ]

        );

    Route::any('search',
    ['as' => 'search',
    'uses'=> 'AccountController@search', ]

    );

    Route::get('accounts',
        ['as' => 'accountsall',
        'uses'=> 'AccountController@index', ]

    );

    Route::get('accounts/{id}',
        ['as' => 'accounts',
        'uses'=> 'AccountController@show', ]

    );

    Route::get('file/{file}',
        ['as' => 'file',
        'uses'=> 'NoteController@showfile', ]

    );

    Route::get('users/{id}',
        ['as' => 'users',
        'uses'=> 'UserController@show', ]

    );

    Route::get('useredit/{id}',
        ['as' => 'useredit',
        'uses'=> 'UserController@edit', ]

    );

    Route::any('userupdate/{id?}',
        ['as' => 'userupdate',
        'uses'=> 'UserController@update', ]

    );

    Route::get('contacts',
  ['as'       => 'contacts',
        'uses'=> 'ContactController@index',

]);

    Route::post('contcreate',
  ['as'       => 'contcreate',
        'uses'=> 'ContactController@store',

]);

    Route::get('contview/{id}',
  ['as'       => 'contview',
        'uses'=> 'ContactController@show',

]);

    Route::any('contedit/{id?}',
  ['as'       => 'contedit',
        'uses'=> 'ContactController@edit',

]);

    Route::any('contupdate/{id?}',
  ['as'       => 'contupdate',
        'uses'=> 'ContactController@update',

]);

    Route::any('contdel/{id?}',
  ['as'       => 'contdel',
        'uses'=> 'ContactController@destroy',

]);

    Route::post('notenotecreate',
        ['as' => 'notecreate',
        'uses'=> 'NoteController@store', ]

    );

    Route::any('noteupdate',
        ['as' => 'noteupdate',
        'uses'=> 'NoteController@update', ]

    );

    Route::get('accountedit/{id}',
        ['as' => 'accountedit',
        'uses'=> 'AccountController@edit', ]

    );

    Route::any('accountupdate/{id?}',
        ['as' => 'accountupdate',
        'uses'=> 'AccountController@update', ]

    );

    Route::any('accountdelete/{id?}',
        ['as' => 'accountdelete',
        'uses'=> 'AccountController@destroy', ]

    );

    Route::get('countries',
        ['as' => 'countriesall',
        'uses'=> 'CountriesController@index', ]

        );
    Route::get('countries/{id}',
        ['as' => 'countries',
        'uses'=> 'CountriesController@show', ]

        );

    Route::get('newcountry',
        ['as' => 'newcountry',
        'uses'=> 'CountriesController@create', ]

    );

    Route::post('countrycreate',
        ['as' => 'countrycreate',
        'uses'=> 'CountriesController@store', ]

    );

    Route::get('countryedit/{id?}',
        ['as' => 'countryedit',
        'uses'=> 'CountriesController@edit', ]

    );

    Route::post('countryupdate/{id?}',
        ['as' => 'countryupdate',
        'uses'=> 'CountriesController@update', ]

    );

    Route::get('newaccount',
        ['as' => 'newaccount',
        'uses'=> 'AccountController@create', ]

        );

    Route::post('accountcreate',
        ['as' => 'accountcreate',
        'uses'=> 'AccountController@store', ]

        );
});
