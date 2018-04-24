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
// Route::get('/admin', 'AdminController@index');
// and we can use Route::post() as well
// Route::get('/', function () {

// 	// $data = [
// 	// 	'Rahul','amit','karan','nikhil'
// 	// ];
// 	/*we can use compact to pass data */
//     //return view('test-data', compact('data'));
    
//     with helper of laravel with method chaining
//     //return view('test-data')->with('names', $data);

//     /*with dynamic methods*/
//     //return view('test-data')->withNames($data);
//     //
//    	return "<h1>Hello</h1>";
// })->middleware('logger');


/**
 * Used at time of REST APIs
 */
// Route::put();
// Route::patch();
// Route::delete();
// 
/**
 * Routes Controller
 */
//Route::controller('admin', 'AdminController');

Route::group(['middleware' => 'web'], function() {
	//Route::get('/', 'AdminController@dashboard');
	Route::post('form-submit', [
	'uses' => 'AdminController@formSubmit',
	'as' => 'f.submit',
	]);

});

//Route::get('test', 'TestController@test');
Route::get('/', 'ArticlesController@index')->name('home');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');
Route::get('/articles/tags/{tag}', 'TagsController@index');
//Route::post('articles/{id}/comments', 'CommentsController@store');

Route::any('articles/comments',  ['uses' => 'CommentsController@store', 'as' => 'comment.add']);

Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
//Route::post('register',  ['uses' => 'RegistrationController@store', 'as' => 'register.user']);
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store');

// Route::get('posts', 'PostsController@index');
// Route::get('posts/create', 'PostsController@create');
// Route::get('posts/{id}', 'PostsController@show');
// Route::post('posts', 'PostsController@store');

Route::get('logout', 'SessionsController@destroy');




