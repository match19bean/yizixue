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


Route::get('/user/get', 'UserController@getAll');
Route::get('/post/get', 'PostController@getAll');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/post', 'PostController@index')->name('post');
Route::get('/home/post/me', 'PostController@showMyAll')->name('my-post');
Route::post('/home/post/create', 'PostController@create')->name('create-post');
Route::get('/user/profile', 'UserController@profile')->name('profile');
Route::post('/user/profile/update', 'UserController@update')->name('update-profile');

Route::get('/bulletinboard', 'BulletinBoardController@index')->name('bulletinboard');
Route::get('/qapage', 'QnAController@index')->name('qapage');
Route::get('/qapage/create', 'QnAController@create')->name('create-qa');
