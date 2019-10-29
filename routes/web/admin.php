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

  Route::get('companies/{company}/edit', function () {
		return view('admin.companies.edit');
  })->name('companies.edit');
  
  Route::patch('companies/{company}', function () {
		return view('admin.companies.update');
	})->name('companies.update');

	Route::get('invite', function () {
		return view('admin.invite');
	})->name('invite');

	Route::get('profile', function () {
		return view('admin.profile');
	})->name('profile');

	Route::get('recruitments', function () {
		return view('admin.posts.index', ['faker' => Faker\Factory::create('ja_JP')]);
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
  
  Route::get('notifications', function () {
		return view('admin.notifications.index', ['faker' => Faker\Factory::create('ja_JP')]);
	})->name('notifications.index');

	Route::get('notifications/{notification}', function () {
		return view('admin.notifications.show');
	})->name('notifications.show');

	Route::get('notifications/{notification}/edit', function () {
		return view('admin.notifications.edit');
	})->name('notifications.edit');

	Route::patch('notifications/{notification}', function () {
		return view('admin.notifications.update');
  })->name('notifications.update');
  
  Route::get('messages', function () {
		return view('admin.messages.index', ['faker' => Faker\Factory::create('ja_JP')]);
	})->name('messages.index');

	Route::get('messages/{message}', function () {
		return view('admin.messages.show');
	})->name('messages.show');

	Route::get('messages/{message}/edit', function () {
		return view('admin.messages.edit');
	})->name('messages.edit');

	Route::patch('messages/{message}', function () {
		return view('admin.messages.update');
  })->name('messages.update');

  Route::delete('messages', function () {
		return view('admin.messages.delete');
  })->name('messages.delete');
  
  Route::get('payments', function () {
		return view('admin.payments.index', ['faker' => Faker\Factory::create('ja_JP')]);
	})->name('payments.index');

	Route::get('payments/{payment}', function () {
		return view('admin.payments.show');
	})->name('payments.show');

	Route::get('payments/{payment}/edit', function () {
		return view('admin.payments.edit');
	})->name('payments.edit');

	Route::patch('payments/{payment}', function () {
		return view('admin.payments.update');
  })->name('payments.update');
  
  Route::delete('payments', function () {
		return view('admin.payments.delete');
  })->name('payments.delete');

  Route::get('tickets', function () {
    return view('admin.tickets.index', ['faker' => Faker\Factory::create('ja_JP')]);
  })->name('tickets.index');
  
  Route::get('tickets/{ticket}', function () {
    return view('admin.tickets.show');
  })->name('tickets.show');
  
  Route::get('tickets/{ticket}/edit', function () {
    return view('admin.tickets.edit');
  })->name('tickets.edit');
  
  Route::patch('tickets/{ticket}', function () {
    return view('admin.tickets.update');
  })->name('tickets.update');
  
  Route::delete('tickets', function () {
    return view('admin.tickets.delete');
  })->name('tickets.delete');
});