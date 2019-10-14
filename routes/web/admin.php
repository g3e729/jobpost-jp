<?php

Route::group([
    'namespace'  => '',
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth', 'role:admin'],
], function () {
	Route::get('/', function () {
		return view('admin.index');
	})->name('index');

	Route::get('companies', function () {
		return view('admin.companies.index');
	})->name('companies.index');

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

	Route::get('staffs', function () {
		return view('admin.employees.index');
	})->name('staffs.index');

	Route::get('staffs/{employee}', function () {
		return view('admin.employees.show');
	})->name('staffs.show');

	Route::get('staffs/{employee}/edit', function () {
		return view('admin.employees.edit');
	})->name('staffs.edit');

	Route::patch('staffs/{employee}', function () {
		return view('admin.employees.update');
	})->name('staffs.update');

	Route::get('students', function () {
		return view('admin.students.index');
	})->name('students.index');

	Route::get('students/{student}', function () {
		return view('admin.students.show');
	})->name('students.show');

	Route::get('students/{student}/edit', function () {
		return view('admin.students.edit');
	})->name('students.edit');

	Route::patch('students/{student}', function () {
		return view('admin.students.update');
	})->name('students.update');
});