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

Route::get('/', 'Main@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/todo', 'Todo');
Route::get('/edit-item/{id}', 'Todo@edit');

Route::get('/get-mine/{id}', 'Todo@getUserList');
Route::get('/change-status/{id}/{status}', 'Todo@changeStatus');
Route::post('/search', 'Main@search');
Route::get('/get-all/', 'Main@getAll');

//User-profile
Route::get('/edit-profile', 'Profile@index');
Route::post('/create-profile', 'Profile@store');
Route::get('/show-profile', 'Profile@show');
Route::post('/update-profile/{id}', 'Profile@update');

Route::get('/edit-item/{id}', 'Todo@show');
Route::post('/update-item/{id}', 'Todo@update');
Route::get('/delete-item/{id}', 'Todo@destroy');
