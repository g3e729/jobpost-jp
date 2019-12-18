<?php


Route::group([
    'namespace'  => 'API',
], function () {
	
	Route::get('jobs-filters', 'JobPostController@getJobFilters');
	Route::resource('jobs', 'JobPostController')->only('index', 'show');

	Route::group([
	    'middleware' => ['App\Http\Middleware\ApiCheck'],
	], function () {
		Route::get('account', 'AccountController@details');
		Route::patch('account', 'AccountController@update');
		Route::patch('update-password', 'AccountController@updatePassword');
		Route::resource('messages', 'MessageController')->only('index', 'show', 'store');

		Route::resource('companies', 'CompanyController')->only('index', 'show');
		Route::resource('students', 'StudentController')->only('index', 'show');

		Route::get('companies-filters', 'CompanyController@getCompanyFilters');
		Route::get('students-filters', 'StudentController@getStudentFilters');

		Route::post('like', 'LikeController@like');
		Route::post('apply', 'ApplyController@store');

		Route::resource('notifications', 'NotificationController')->only('index', 'update');
	});
});