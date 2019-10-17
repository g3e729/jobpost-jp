<?php

Route::group([
    'namespace'  => 'Admin',
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth', 'role:admin'],
], function () {
	Route::get('/', 'HomeController@index')->name('index');

	Route::resource('companies', 'CompanyController')->only('index', 'show', 'edit', 'update');

	Route::resource('invite', 'InvitationController')->only('create', 'store');

	Route::get('invite', function () {
		return view('admin.invite');
	})->name('invite');

	Route::get('profile', function () {
		return view('admin.profile');
	})->name('profile');

	Route::get('recruitments', function () {
		return view('admin.posts.index');
	})->name('recruitments.index');

	Route::get('recruitments/{post}', function () {
		return view('admin.posts.show');
	})->name('recruitments.show');

	Route::get('recruitments/{post}/edit', function () {
		return view('admin.posts.edit');
	})->name('recruitments.edit');

	Route::patch('recruitments/{post}', function () {
		return view('admin.posts.update');
	})->name('recruitments.update');

	Route::resource('employees', 'EmployeeController')->only('index', 'show', 'edit', 'update');

	Route::resource('students', 'StudentController', [
        'parameters' => [
            'seeker_profile' => 'student',
        ],
    ])->only('index', 'show', 'edit', 'update');
});