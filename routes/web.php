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
/*
Route::get('/', function () {
    return view('index');
});
*/
Route::get('/', 'Controller@index');
Route::get('/userlogins', 'SerialController@showUserLogins');
Route::post('/userlogouts', 'SerialController@userLogout');
/*
Route::get('/admin', function () {
    return view('admin');
});
*/

Route::get('/admin', 'SerialController@adminLogin');
Route::post('/user', 'SerialController@userLogin');


Route::get('/admin/{room}/stats', 'RoomController@stats');

Route::get('/admin/{room}/stats/users', 'RoomController@users');
Route::get('/admin/{room}/stats/userlogins', 'RoomController@userlogins');
Route::get('/admin/{room}/stats/userlogouts', 'RoomController@userlogouts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rfidlogin', 'SerialController@rfidlogin');


