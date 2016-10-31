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

Route::group(['prefix' => 'admin','middleware' => ['web']], function () {
    Route::auth();

    //Admin
    Route::get('/',[
        'uses' => 'AdminController@index',
        'as'   => 'AdminIndex'
    ]);

    //---Categorias---//
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
    Route::get('category/combo/comboCat',[
        'uses' => 'CategoriaController@categoriasCombo',
        'as'   => 'CategoriasCombo'
    ]);

    //---SubCategorias---//
    Route::get('/subcategory/{page?}',[
        'uses' => 'SubCategoriaController@getAll',
        'as'   => 'SubCategoriaIndex'
    ]);
    Route::get('subcategory/{id}/destroy',[
        'uses' => 'SubCategoriaController@delete',
        'as'   => 'SubCategoriaDestroy'
    ]);
    Route::get('subcategory/{id}/edit',[
        'uses' => 'SubCategoriaController@get',
        'as'   => 'SubCategoriaEdit'
    ]);
    Route::post('subcategory/addOrUpdate',[
        'uses' => 'SubCategoriaController@addOrUpdate',
        'as'   => 'SubCategoriaAddOrUpdate'
    ]);

    Route::get('subcategory/combo/comboSubCat',[
        'uses' => 'SubCategoriaController@subcategoriasCombo',
        'as'   => 'SubCategoriasCombo'
    ]);

    //---Articulos---//
    Route::get('/article/{page?}',[
        'uses' => 'ArticuloController@getAll',
        'as'   => 'ArticuloIndex'
    ]);
    Route::get('article/{id}/destroy',[
        'uses' => 'ArticuloController@delete',
        'as'   => 'ArticuloDestroy'
    ]);
    Route::get('article/{id}/edit',[
        'uses' => 'ArticuloController@get',
        'as'   => 'ArticuloEdit'
    ]);
    Route::post('article/addOrUpdate',[
        'uses' => 'ArticuloController@addOrUpdate',
        'as'   => 'ArticuloAddOrUpdate'
    ]);

    //---Roles---//
    Route::get('/rol/{page?}',[
        'uses' => 'RolController@getAll',
        'as'   => 'RolIndex'
    ]);
    Route::get('rol/{id}/destroy',[
        'uses' => 'RolController@delete',
        'as'   => 'RolDestroy'
    ]);
    Route::get('rol/{id}/edit',[
        'uses' => 'RolController@get',
        'as'   => 'RolEdit'
    ]);
    Route::post('rol/addOrUpdate',[
        'uses' => 'RolController@addOrUpdate',
        'as'   => 'RolAddOrUpdate'
    ]);

    //---Usuarios---//
    Route::get('/user/{page?}',[
        'uses' => 'UserController@getAll',
        'as'   => 'UserIndex'
    ]);
    Route::get('user/{id}/destroy',[
        'uses' => 'UserController@delete',
        'as'   => 'UserDestroy'
    ]);
    Route::get('user/{id}/edit',[
        'uses' => 'UserController@get',
        'as'   => 'UserEdit'
    ]);
    Route::post('user/addOrUpdate',[
        'uses' => 'UserController@addOrUpdate',
        'as'   => 'UserAddOrUpdate'
    ]);

});
