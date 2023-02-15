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
use App\Http\Controllers\SearchController;
Route::get('/','MainController@index');
// Route::get('/login', function () {
//     return view('welcome');
// });


//admin

Route::group(['prefix' => 'admin', 'middleware' => ['auth','isAdmin']], function(){
    Route::get('/', 'AdminController@dashboard')->name('mainadmin.index');
    Route::get('/{user}', 'AdminController@show')->name('admin.index');
    Route::post('/createuser', 'AdminController@store')->name('admin.create');

    //Updating User
    Route::get('/{id}/edit', 'AdminController@edit')->name('admin.edit');
    Route::patch('/{id}/update', 'AdminController@update')->name('admin.update');


    Route::get('/{id}/delete', 'AdminController@delete')->name('admin.delete');


});

//appraiser
Route::group(['prefix' => 'appraiser'], function(){
    Route::get('/', 'AppraiserController@index')->name('appraiser.index');
    Route::get('/trade-in', 'AppraiserController@show')->name('customer.index');
    //adding of customer
    Route::get('/addcustomer', 'AppraiserController@addcustomer');
    Route::post('/createcustomer', 'CustomerController@store');
    //assigning of vehicles
    Route::get('/{id}/assignvehicle', 'AppraiserController@assign');
    Route::post('/{id}/assigned', 'VehicleController@store');

    //searching of customer
    Route::get('/trade-in', 'SearchController@index')->name('trade-in.index');
    Route::get('/trade-in/action', 'SearchController@action')->name('trade-in.action');

    
    // Route::get('/live_search', 'SearchController@index');
    // Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');

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





