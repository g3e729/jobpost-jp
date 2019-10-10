<?php

Route::get('/', function () {
	return redirect()->route('login');
});
Auth::routes();

Route::get('/lo', 'Auth\LoginController@logout');