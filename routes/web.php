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

//admin
Route::resource('/admin/games', 'GamesController');
Route::get('/admin', 'GamesController@index');
Route::get('/admin/search', 'GamesController@search');
Route::delete('/admin/deleteall', 'GamesController@deleteAll');

//user
Route::resource('/user', 'HomeController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/search', 'HomeController@search');
// Route::get('/user', 'CommentsController@show');
// Route::get('/user/{{}}/comments', 'CommentsController@store')->name('comment.store');
// Route::get('/user/reply', 'CommentsController@replyStore')->name('reply.add');
Route::resource('/user/comments', 'CommentsController');
Route::resource('/user/replies', 'RepliesController');

//public
Route::resource('/games', 'PublicController');
Route::get('/', 'PublicController@index');
Route::get('/search', 'PublicController@search');