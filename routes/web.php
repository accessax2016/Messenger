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

Route::get('/', 'HomeController@getHome')->name('home');
Route::get('/room/{id}/{name_url}', 'HomeController@getHome')->name('messenger');
Route::get('/profile', 'HomeController@getProfile')->name('profile');
Route::post('/update-profile', 'HomeController@postUpdateProfile')->name('update-profile');
Route::post('/change-password', 'HomeController@postChangePassword')->name('change-password');


Route::group(['prefix' => 'api', 'namespace' => 'api', 'middleware' => 'auth'], function() {
	Route::group(['prefix' => 'rooms'], function() {
	    Route::get('/', 'RoomController@getListRoom');
	    Route::post('/create', 'RoomController@postCreateRoom');
	}); 
	Route::group(['prefix' => 'messages'], function() {
	    Route::get('room/{id}', 'MessageController@getMessagesOfRoom');
	    Route::post('send', 'MessageController@sendMessage');
	});
	Route::group(['prefix' => 'users'], function() {
	    Route::get('current-user', 'UserController@getCurrentUser');
	    Route::get('count-users-in-channels', 'UserController@getUsersInChannels');
	});
});