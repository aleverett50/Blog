<?php

Route::get('/', 'WelcomeController@index');
Route::get('no-auth', function(){

	return view('no-auth');

});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('blogs', 'BlogsController@index');
Route::get('verify/{activation_code}', 'PagesController@verify');
Route::get('dashboard', ['middleware' => 'auth', 'uses' => 'PagesController@dashboard']);
Route::get('dashboard/blogs', ['middleware' => 'auth', 'uses' => 'BlogsController@my_blogs']);
Route::get('blogs/{id}/edit', ['middleware' => ['auth', 'owner'], 'uses' => 'BlogsController@edit']);
Route::get('blogs/create', ['middleware' => 'auth', 'uses' => 'BlogsController@create']);
Route::post('blogs', ['middleware' => 'auth', 'uses' => 'BlogsController@store']);
Route::put('blogs/{id}', ['middleware' => ['auth', 'owner'], 'uses' => 'BlogsController@update']);
Route::get('blog/{id}', 'BlogsController@show');
Route::get('blogs/{category}', 'BlogsController@category');

/*

Route::get('cats/{id}/delete', 'CatController@destroy');

*/