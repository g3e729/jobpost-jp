<?php


Route::group([
    'namespace'  => 'API',
], function () {
	
	Route::get('jobs-filters', 'JobPostController@getJobFilters');
	Route::resource('jobs', 'JobPostController')->only('index', 'show');

	Route::group([
	    // 'middleware' => ['auth'],
	], function () {
		Route::get('account', 'AccountController@details');
		Route::patch('account', 'AccountController@update');

		Route::resource('companies', 'CompanyController')->only('index', 'show');
		Route::resource('students', 'StudentController')->only('index', 'show');

		Route::post('like', 'LikeController@like');


		Route::resource('notifications', 'NotificationController')->only('index', 'update');
	});
});