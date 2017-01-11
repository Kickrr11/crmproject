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
    array('as'=>'login',
    'uses'=> 'AuthController@login')
    
    ); 
	
Route::any('logged',
    array('as'=>'logged',
    'uses'=> 'AuthController@logged')
    
    ); 
	
	Route::any('registration',
    array('as'=>'registration',
    'uses'=> 'AuthController@registration')
    
    ); 

Route::any('regcreate',
    array('as'=>'regcreate',
    'uses'=> 'AuthController@createRegistration')
    
    ); 




Route::group(['middleware' => ['auth']], function () {    
    Route::any('logout',
        array('as'=>'logout',
        'uses'=> 'AuthController@doLogout')

        ); 
  
Route::any('dashboard',
        array('as'=>'dashboard',
        'uses'=> 'HomeController@hello')

        ); 
		
Route::any('search',
    array('as'=>'search',
    'uses'=> 'AccountController@search')
    
    ); 



Route::get('accounts',
        array('as'=>'accountsall',
        'uses'=> 'AccountController@index')

    ); 

Route::get('accounts/{id}',
        array('as'=>'accounts',
        'uses'=> 'AccountController@show')

    ); 

Route::get('file/{file}',
        array('as'=>'file',
        'uses'=> 'NoteController@showfile')         

    ); 

Route::get('users/{id}',
        array('as'=>'users',
        'uses'=> 'UserController@show')

    ); 

Route::get('useredit/{id}',
        array('as'=>'useredit',
        'uses'=> 'UserController@edit')

    ); 

Route::any('userupdate/{id?}',
        array('as'=>'userupdate',
        'uses'=> 'UserController@update')

    ); 
	
Route::get('contacts',
  array('as'=>'contacts',
        'uses'=> 'ContactController@index'

)); 


Route::post('contcreate',
  array('as'=>'contcreate',
        'uses'=> 'ContactController@store'

)); 

Route::get('contview/{id}',
  array('as'=>'contview',
        'uses'=> 'ContactController@show'

)); 


Route::any('contedit/{id?}',
  array('as'=>'contedit',
        'uses'=> 'ContactController@edit'

)); 

Route::any('contupdate/{id?}',
  array('as'=>'contupdate',
        'uses'=> 'ContactController@update'

)); 


Route::any('contdel/{id?}',
  array('as'=>'contdel',
        'uses'=> 'ContactController@destroy'

)); 

Route::post('notenotecreate',
        array('as'=>'notecreate',
        'uses'=> 'NoteController@store')

    ); 
	
	Route::any('noteupdate',
        array('as'=>'noteupdate',
        'uses'=> 'NoteController@update')

    ); 

Route::get('accountedit/{id}',
        array('as'=>'accountedit',
        'uses'=> 'AccountController@edit')

    ); 

Route::any('accountupdate/{id?}',
        array('as'=>'accountupdate',
        'uses'=> 'AccountController@update')

    ); 

Route::any('accountdelete/{id?}',
        array('as'=>'accountdelete',
        'uses'=> 'AccountController@destroy')

    ); 
	
Route::get('countries',
        array('as'=>'countriesall',
        'uses'=> 'CountriesController@index')

        ); 
    Route::get('countries/{id}',
        array('as'=>'countries',
        'uses'=> 'CountriesController@show')

        ); 
    
    Route::get('newcountry',
        array('as'=>'newcountry',
        'uses'=> 'CountriesController@create')

    ); 
    

    Route::post('countrycreate',
        array('as'=>'countrycreate',
        'uses'=> 'CountriesController@store')

    ); 
    
    Route::get('countryedit/{id?}',
        array('as'=>'countryedit',
        'uses'=> 'CountriesController@edit')

    ); 
    
    Route::post('countryupdate/{id?}',
        array('as'=>'countryupdate',
        'uses'=> 'CountriesController@update')

    ); 
    
    
    Route::get('newaccount',
        array('as'=>'newaccount',
        'uses'=> 'AccountController@create')

        ); 
    
    Route::post('accountcreate',
        array('as'=>'accountcreate',
        'uses'=> 'AccountController@store')

        ); 
    
});