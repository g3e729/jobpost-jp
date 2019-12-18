<?php

Route::get('/', function () {
	return view('errors.developing');
});

// Authentication Routes...
Route::group([
    'namespace'  => 'Auth',
], function () {
	Route::get('login', 'LoginController@showLoginForm')->name('login');
	Route::post('login', 'LoginController@login');
  Route::post('logout', 'LoginController@logout')->name('logout');

  Route::get('password/request/success', function () {
    return view('auth.passwords.request_success');
  })->name('password.request.success');
  Route::get('password/reset/success', function () {
    return view('auth.passwords.edit_success');
  })->name('password.reset.success');

	// Password Reset Routes...
	Route::get('password/request', 'ForgotPasswordController@create')->name('password.request');
	Route::post('password/request', 'ForgotPasswordController@store');
	Route::get('password/reset/{token}', 'ForgotPasswordController@edit')->name('password.reset');
  Route::patch('password/update', 'ForgotPasswordController@update')->name('password.update');
});

Route::resource('register', 'Auth\RegisterController')->only('create', 'store');

Route::view('/app/{path?}', 'app')->name('top.page');
Route::view('/app/{path?}dashboard', 'app')->name('top.dashboard.page');
Route::get('/prmovie', function(){
    return view('prmovie.index');
});
