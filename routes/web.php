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

Route::get('/', 'PostController@index');

Route::resource('/posts', 'PostController');
Route::resource('/tags', 'TagController');
Route::patch('/posts/{post}/like', 'PostController@like');
Route::patch('/posts/{post}/dislike', 'PostController@dislike');

Route::post('/posts/{post}/comments', 'CommentController@store');
Route::delete('/comments/{comment}', 'CommentController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
