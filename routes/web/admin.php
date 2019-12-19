<?php

Route::group([
    'namespace'  => 'Admin',
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth', 'role:admin'],
], function () {
	Route::get('/', 'HomeController@index')->name('index');
	Route::get('api/settings/sidebar', 'AccountController@toggleSidebar')->name('sidebar.update');

	Route::resource('companies', 'CompanyController');
	Route::resource('invite', 'InvitationController')->only('create', 'store');
	Route::resource('employees', 'EmployeeController');
	Route::resource('students', 'StudentController', [
		'parameters' => [
			'seeker_profile' => 'student',
		],
	]);
	Route::resource('payments', 'PaymentController')->only('index', 'show', 'update', 'destroy');
	Route::resource('tickets', 'TicketController')->only('index', 'destroy');
	Route::resource('settings', 'AccountController')->only('index', 'store');
	Route::resource('notifications', 'NotificationController');
	Route::resource('recruitments', 'JobPostController', [
		'parameters' => [
			// 'job_post' => 'recruitment',
		],
	]);

	
	Route::get('messages', 'MessageController@index')->name('messages.index');
	Route::delete('messages/{channel}', 'MessageController@destroy')->name('messages.destroy');
});
