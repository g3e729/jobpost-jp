<?php

Route::get('/', function () {
	return view('errors.developing');
});

// Authentication Routes...
Route::group([
    'namespace'  => 'Auth',
], function () {
	Route::get('login', 'LoginController@showLoginForm')->name('login');
	Route::post('login', 'LoginController@preLogin');
	Route::post('logout', 'LoginController@logout')->name('logout');

	// Password Reset Routes...
	Route::get('password/request', 'ForgotPasswordController@create')->name('password.request');
	Route::post('password/request', 'ForgotPasswordController@store');
	Route::get('password/reset/{token}', 'ForgotPasswordController@edit')->name('password.reset');
	Route::patch('password/update', 'ForgotPasswordController@update')->name('password.update');
});

Route::resource('register', 'Auth\RegisterController')->only('create', 'store');

Route::view('/react/{path?}', 'app')->name('top.page');
