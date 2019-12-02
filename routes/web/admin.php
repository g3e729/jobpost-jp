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

	Route::get('recruitments', function () {
		return view('admin.posts.index', ['faker' => Faker\Factory::create('ja_JP')]);
  	})->name('recruitments.index');

  	Route::get('recruitments/create', function () {
		return view('admin.posts.create', [
	      'programming_languages' => App\Models\SeekerProfile::getProgrammingLanguages(),
	      'frameworks' => App\Models\SeekerProfile::getFrameworks(),
	      'positions' => App\Models\SeekerProfile::getPositions(),
	      'databases' => App\Models\SeekerProfile::getDatabases(),
	      'environments' => App\Models\SeekerProfile::getOthers(),
	      'employment_status' => App\Models\SeekerProfile::getEmploymentStatus(),
	      'income' => App\Models\SeekerProfile::getIncome(),
	      'prefectures' => getPrefecture()
	    ]);
	})->name('recruitments.create');

	Route::get('recruitments/{post}', function () {
		return view('admin.posts.show', ['index' => Request::route('post')]);
	})->name('recruitments.show');

	Route::delete('recruitments/{post}', function () {
		return view('admin.posts.delete');
	})->name('recruitments.delete');

	Route::get('recruitments/{post}/edit', function () {
		return view('admin.posts.edit', [
	      'faker' => Faker\Factory::create('ja_JP'),
	      'programming_languages' => App\Models\SeekerProfile::getProgrammingLanguages(),
	      'frameworks' => App\Models\SeekerProfile::getFrameworks(),
	      'positions' => App\Models\SeekerProfile::getPositions(),
	      'databases' => App\Models\SeekerProfile::getDatabases(),
	      'environments' => App\Models\SeekerProfile::getOthers(),
	      'employment_status' => App\Models\SeekerProfile::getEmploymentStatus(),
	      'income' => App\Models\SeekerProfile::getIncome(),
	      'prefectures' => getPrefecture()
	    ]);
	})->name('recruitments.edit');

	Route::patch('recruitments/{post}', function () {
		return view('admin.posts.update');
	})->name('recruitments.update');

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
