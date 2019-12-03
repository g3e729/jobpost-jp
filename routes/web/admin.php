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

	

	Route::get('messages', function () {
		return view('admin.messages.index', ['faker' => Faker\Factory::create('ja_JP')]);
	})->name('messages.index');

  	Route::get('messages/{entity}', function () {
		return view('admin.messages.show', [
	      'faker' => Faker\Factory::create('ja_JP'),
	      'type' => Request::input('type')
	    ]);
	})->name('messages.show');

	Route::delete('messages', function () {
		return view('admin.messages.delete');
	})->name('messages.delete');
});
