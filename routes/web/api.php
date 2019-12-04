<?php


Route::group([
    'namespace'  => 'API',
    'prefix'     => 'api/v1',
], function () {
	
	Route::resource('jobs', 'JobPostController')->only('index', 'show');

	Route::group([
	    // 'middleware' => ['auth'],
	], function () {
		Route::resource('companies', 'CompanyController')->only('index', 'show');
		Route::resource('students', 'StudentController')->only('index', 'show');
	});
});