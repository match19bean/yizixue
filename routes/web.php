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

Route::get('/list-posts', 'PostController@list')->name('list-all-posts');
Route::get('/collect-posts', 'PostController@collect')->name('collect-posts');
Route::get('/create-post', 'PostController@create')->name('create-post');
Route::get('/edit-post/{uuid}', 'PostController@edit')->name('edit-post');
Route::post('/save-post', 'PostController@save')->name('save-post');
Route::post('/update-post', 'PostController@update')->name('update-post');
Route::get('/delete-post/{uuid}', 'PostController@delete')->name('delete-post');

Route::get('/user/get', 'UserController@getAll');
Route::get('/user/profile', 'UserController@profile')->name('profile');
Route::post('/user/profile/update', 'UserController@update')->name('update-profile');

Route::get('/bulletinboard', 'BulletinBoardController@index')->name('bulletinboard');
Route::get('/qapage', 'QnAController@index')->name('qapage');
Route::get('/qapage/me', 'QnAController@showMyAll')->name('my-qa');
Route::post('/qapage/create', 'QnAController@create')->name('create-qa');
