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
//     return view('home');
// })->name('home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/userHome', 'HomeController@userGet')->name('userHome');

//START POSTS PART
Route::get('posts/getPost', 'PostsController@getPost');
Route::post('posts/deletePost', 'PostsController@deletePost');
Route::post('posts/updatePost', 'PostsController@updatePost');
Route::post('posts/createPost', 'PostsController@createPost');
//END POSTS PART