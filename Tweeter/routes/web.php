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

Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/tweets/{tweet}/like', 'TweetController@like');

Route::post('/tweets/{tweet}/unlike', 'TweetController@unlike');

Route::get('/user/tweetlist', 'TweetController@tweetlist')->name('tweetlist');

Route::get('/user/tweetlist/{user}', 'TweetController@tweetlist')->name('usertweetlist');

Route::resource('/comments', 'CommentController');

Route::post('/comments/{tweet}', 'CommentController@store');

Route::get('/comments/create/{tweet}', 'CommentController@create');

Route::resource('/profiles', 'ProfilesController');

Route::get('/profiles/{user}', 'ProfilesController@index')->name('profile');

Route::get('/user/following', 'FollowsController@following')->name('following');

Route::get('/user/following/{user}', 'FollowsController@following')->name('userfollowing');

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/follow/{user}', 'FollowsController@store');

Route::get('/user/followers', 'FollowsController@followers')->name('followers');

Route::get('/user/followers/{user}', 'FollowsController@followers')->name('userfollowers');

Route::get('/marketing', 'TweetController@marketing')->name('marketing');