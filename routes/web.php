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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'PublicController@getHome')->name('home');
Route::get('register','PublicController@getRegister');
Route::post('register','PublicController@postRegister');
// Route::get('logout', 'LoginController@logout');

//User
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){

	Route::get('all', ['middleware' => 'auth', 'uses' => 'PublicController@getAllUser']);
	Route::get('allData', ['middleware' => 'auth', 'uses' => 'PublicController@getAllData']);
});
