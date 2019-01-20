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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'posts'],function(){
	Route::get('/','PostController@index');
	Route::get('/create','PostController@create')->middleware('auth');
	Route::get('/{post}','PostController@show');

	Route::get('/{post}/edit','PostController@edit')->middleware('postowner');
	Route::put('/{post}','PostController@update')->middleware('postowner');
	Route::delete('/{post}','PostController@destroy')->middleware('postowner');

	Route::get('/category/{category_id}','PostController@category');
	Route::post('/','PostController@store')->middleware('auth');
});


Route::group(['prefix'=>'user'], function(){
	Route::get('/posts', 'UserController@posts');
	Route::get('/comments', 'UserController@comments');
});

Route::group(['prefix'=>'comments'], function(){
	Route::get('/{comment}', 'CommentController@show');
	Route::get('/{comment}/edit', 'CommentController@edit')->middleware('commentowner');
	Route::put('/{comment}', 'CommentController@update')->middleware('commentowner');

});

// Route::get('/comments/{comment}','CommentController@show');

Route::get('/search/{str}','SearchController@search');
Route::get('/autosearch/{str}','SearchController@suggest');

Route::get('/author/{author}', 'PostController@byAuthor');

// Route::get('/profile','ProfileController@edit')->middleware('auth');
// Route::put('/profile','ProfileController@update')->middleware('auth');

Route::get('/editProfile', 'ProfileController@edit')->middleware('auth');
Route::put('/editProfile', 'ProfileController@update')->middleware('auth');


//ADMIN ROUTES
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){
	Route::resource('posts','PostController');
	Route::get('posts/{post}/changestatus', 'PostController@changePublishedStatus');
	Route::get('comments/{comment}/changestatus', 'CommentController@changePublishedStatus');
	Route::resource('comments', 'CommentController');
	Route::resource('users', 'UserController');
});
