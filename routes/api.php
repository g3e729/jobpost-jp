<?php


Route::group([
    'namespace'  => 'API',
	'middleware' => ['App\Http\Middleware\ApiCheck'],
], function () {
	
	Route::get('jobs-filters', 'JobPostController@getJobFilters');
	Route::resource('jobs', 'JobPostController')->only('index', 'show');

	Route::resource('companies', 'CompanyController')->only('index', 'show');
	Route::resource('students', 'StudentController')->only('index', 'show');

	Route::get('search', 'SearchController@search');

	Route::group([
	], function () {
		Route::get('account', 'AccountController@details');
		Route::patch('account', 'AccountController@update');
		Route::patch('update-password', 'AccountController@updatePassword');
		Route::resource('messages', 'MessageController')->only('index', 'show', 'store');
		Route::patch('messages/{channel}/seen', 'MessageController@seen');


		Route::get('companies-filters', 'CompanyController@getCompanyFilters');
		Route::get('students-filters', 'StudentController@getStudentFilters');

		Route::post('like', 'LikeController@like');
		Route::post('apply', 'ApplyController@store');
		Route::get('applications', 'ApplyController@index');
		Route::delete('cancel-application', 'ApplyController@destroy');

		Route::resource('notifications', 'NotificationController')->only('index', 'update');
	});


	Route::group([
	    'middleware' => ['App\Http\Middleware\ApiCheck:company'],
	], function () {
		Route::resource('jobs', 'JobPostController')->only('store', 'update');
		Route::delete('jobs/{job}', 'JobPostController@destroy');
		Route::patch('jobs/{job}/update-status', 'JobPostController@toggleStatus');
		Route::get('my-jobs', 'JobPostController@companyJobs');
		Route::patch('companies/{company}', 'CompanyController@update');
	});
});