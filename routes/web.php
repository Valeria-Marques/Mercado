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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/compras', 'ComprasController@index')->name('all-compras');



	Route::prefix('/admin')->group(function () {

        Route::get('/', 'Admin\HomeController@index')->name('admin-home');
        Route::get('/compras', 'Admin\ComprasController@index')->name('course-home');
        Route::get('/compras/create', 'Admin\ComprasController@form')->name('form');
        Route::post('/compras/create', 'Admin\ComprasController@create')->name('create');
        Route::get('/compras/view', 'Admin\ComprasController@view')->name('view-course');
        Route::get('/compras/delete/{id}', 'Admin\ComprasController@delete')->name('delete');
        Route::get('/compras/update/{id}', 'Admin\ComprasController@update')->name('update');
   	    Route::post('/compras/update/{id}', 'Admin\ComprasController@update_data')->name('update_data');
    
    });
	

	
