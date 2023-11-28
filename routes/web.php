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

Route::get('/posts', 'PostController@all')->name('all-post');
Route::get('/post', 'PostController@create')->name('post');
Route::post('/post', 'PostController@create')->name('create-post');
Route::put('/post', 'PostController@update')->name('update-post');
Route::delete('/post', 'PostController@kill')->name('kill-post');

Route::get('/user/get', 'UserController@getAll');
Route::get('/user/profile', 'UserController@profile')->name('profile');
Route::post('/user/profile/update', 'UserController@update')->name('update-profile');

Route::get('/bulletinboard', 'BulletinBoardController@index')->name('bulletinboard');
Route::get('/qapage', 'QnAController@index')->name('qapage');
Route::get('/qapage/me', 'QnAController@showMyAll')->name('my-qa');
Route::post('/qapage/create', 'QnAController@create')->name('create-qa');
