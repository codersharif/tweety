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
/**
 * App version 1.0
 * @author shariful islam khan
 * 
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//login with facebook
Route::get('login/google', 'Auth\LoginController@googleRedirect');
Route::get('login/google/callback', 'Auth\LoginController@googleCallback');

//login with github
Route::get('login/github', 'Auth\LoginController@githubRedirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@githubHandleProviderCallback');


Route::middleware('auth')->group(function() {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');

    Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
    Route::post('/profiles/{user}/follow', 'FollowsController@store');

    Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user}', 'ProfilesController@update')->middleware('can:edit,user');

    Route::get('explore', 'ExploreController');
    
    Route::post('/tweets/{tweet}/like','TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like','TweetLikesController@destroy');
});



