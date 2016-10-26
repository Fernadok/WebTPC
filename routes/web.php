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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
//Route::get('/category', 'CategoriaController@getAll');

Route::group(['middleware' => 'web'], function () {
  //  Route::auth();

    Route::get('/home',[
        'uses' => 'HomeController@index',
        'as'   => 'homeIndex'
    ]);
});

Route::group(['prefix' => 'admin'], function () {
    Route::auth();

    Route::get('/',[
        'uses' => 'AdminController@index',
        'as'   => 'AdminIndex'
    ]);

    Route::get('/category/{page?}',[
        'uses' => 'CategoriaController@index',
        'as'   => 'CategoriaIndex'
    ]);
    Route::get('user/{id}/destroy',[
        'uses' => 'UsersController@destroy',
        'as'   => 'userDestroy'
    ]);
    Route::get('/user',[
        'uses' => 'UsersController@index',
        'as'   => 'userList'
    ]);
    Route::get('user/{id}/edit',[
        'uses' => 'UsersController@edit',
        'as'   => 'userEdit'
    ]);
});
