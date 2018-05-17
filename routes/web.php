
<?php

Route::get('/', function () {
    return view('welcome');
	});
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::group(['prefix'=>''], function()
	{
		 //Route::get('users','PagesController@index');
		 //Route::get('users/add','PagesController@add');
		Route::resource('users','PagesController');
	});
