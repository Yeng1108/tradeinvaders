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
Route::get('/','MainController@index');
Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/follow/{user}', 'FollowController@store');

Route::post('/p','PostController@store');
Route::get('/p/create','PostController@create');
Route::get('/p/{post}','PostController@show');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');


//admin
Route::get('/admin/{user}', 'AdminController@show')->name('admin.index');
Route::post('/admin/createuser', 'AdminController@store')->name('admin.create');


