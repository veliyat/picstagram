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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/u/{user}', 'ProfilesController@index')->name('profile');
Route::get('/u/{user}/follow', 'UsersController@follow')->name('follow');
Route::get('/u/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

Route::get('/u/profile/create', 'ProfilesController@create')->name('u.profile.create');
Route::post('/u/profile', 'ProfilesController@store')->name('u.profile.store');

Route::resource('p', 'PostsController');

Route::post('/p/{post}/comment', 'PostsController@comment')->name('p.comment');
Route::get('/p/{uid}/{pid}/like', 'PostsController@like')->name('p.like');

Route::get('/s', 'SearchController@results')->name('search');
