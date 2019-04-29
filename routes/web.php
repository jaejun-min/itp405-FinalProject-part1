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
// //
// Route::get('/', function () {
//     return view('signup');
// });
Route::get('/signup', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');
Route::get('/','LoginController@index');
Route::post('/', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/profile', 'AdminController@index');
Route::get('/profile/new', 'AdminController@create');
Route::get('/profile/new/{id}', 'AdminController@getMajorWithId');
Route::post('/profile/new', 'AdminController@store');
Route::get('/profile/{id}/edit', 'AdminController@edit');
Route::post('/profile/{id}/edit', 'AdminController@update');
Route::get('/board', 'BoardController@index');
Route::get('/board/{id}', 'BoardController@delete');
Route::get('/board/new', 'BoardController@create');
Route::get('/board/detail/{id}', 'BoardController@detail');
Route::post('/board/new', 'BoardController@store');
