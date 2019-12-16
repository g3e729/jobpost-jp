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
		Route::resource('messages', 'MessageController')->only('index', 'show', 'store');

		Route::resource('companies', 'CompanyController')->only('index', 'show');
		Route::resource('students', 'StudentController')->only('index', 'show');

		Route::get('companies-filters', 'CompanyController@getCompanyFilters');
		Route::get('students-filters', 'StudentController@getStudentFilters');

		Route::post('like', 'LikeController@like');

		Route::resource('notifications', 'NotificationController')->only('index', 'update');
	});
});