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

Route::group(['middleware' => 'web'], function () {
    //Route::auth();
    Route::get('/home',[
        'uses' => 'HomeController@index',
        'as'   => 'homeIndex'
    ]);
});

Route::group(['prefix' => 'admin'], function () {
    Route::auth();

    //Admin
    Route::get('/',[
        'uses' => 'AdminController@index',
        'as'   => 'AdminIndex'
    ]);

    //Categorias
    Route::get('/category/{page?}',[
        'uses' => 'CategoriaController@getAll',
        'as'   => 'CategoriaIndex'
    ]);
    Route::get('category/{id}/destroy',[
        'uses' => 'CategoriaController@delete',
        'as'   => 'CategoriaDestroy'
    ]);
    Route::get('category/{id}/edit',[
        'uses' => 'CategoriaController@get',
        'as'   => 'CategoriaEdit'
    ]);
    Route::post('category/addOrUpdate',[
        'uses' => 'CategoriaController@addOrUpdate',
        'as'   => 'CategoriaAddOrUpdate'
    ]);
});
