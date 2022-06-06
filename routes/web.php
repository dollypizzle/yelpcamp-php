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



Route::get('/campgrounds', 'CampgroundsController@index');
Route::get('/campgrounds/create', 'CampgroundsController@create')->middleware('auth');
Route::get('/campgrounds/{campground}', 'CampgroundsController@show');
Route::get('/campgrounds/{campground}/edit', 'CampgroundsController@edit')->middleware('auth');
Route::patch('/campgrounds/{campground}', 'CampgroundsController@update');
Route::post('/campgrounds', 'CampgroundsController@store')->middleware('auth');
Route::delete('/campgrounds/{campground}', 'CampgroundsController@destroy');

//comment
Route::get('/campgrounds/{campground}/comments/create', 'CampgroundCommentsController@create')->middleware('auth');
Route::get('/campgrounds/{campground}/comments/edit', 'CampgroundCommentsController@edit')->middleware('auth');
Route::patch('/campgrounds/{campground}/comments', 'CampgroundCommentsController@update');
Route::post('/campgrounds/{campground}/comments', 'CampgroundCommentsController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
