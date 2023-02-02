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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/','MainController@index');
// Route::get('/login', function () {
//     return view('welcome');
// });


//admin

Route::group(['prefix' => 'admin', 'middleware' => ['auth','isAdmin']], function(){
    Route::get('/', 'AdminController@dashboard')->name('mainadmin.index');
    Route::get('/{user}', 'AdminController@show')->name('admin.index');
    Route::post('/createuser', 'AdminController@store')->name('admin.create');

    Route::get('/{id}/edit', 'AdminController@edit')->name('admin.index');

});


Auth::routes();

Route::post('/follow/{user}', 'FollowController@store');

Route::post('/p','PostController@store');
Route::get('/p/create','PostController@create');
Route::get('/p/{post}','PostController@show');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@main')->name('profile.main');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

