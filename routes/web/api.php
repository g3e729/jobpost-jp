<?php


Route::group([
    'namespace'  => 'API',
    'prefix'     => 'api/v1',
], function () {
	
	Route::resource('jobs', 'JobPostController')->only('index', 'show');
	Route::get('jobs-filters', 'JobPostController@getJobFilters');

	Route::group([
	    // 'middleware' => ['auth'],
	], function () {
		Route::get('account', 'AccountController@details');
		Route::patch('account', 'AccountController@update');

		Route::resource('companies', 'CompanyController')->only('index', 'show');
		Route::resource('students', 'StudentController')->only('index', 'show');


		Route::resource('notifications', 'NotificationController')->only('index', 'update');
	});
});