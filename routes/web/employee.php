<?php

Route::group([
    'namespace'  => 'Employee',
    'prefix'     => 'employee',
    'as'         => 'employee.',
    'middleware' => ['auth', 'role:employee'],
], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('api/settings/sidebar', 'AccountController@toggleSidebar')->name('sidebar.update');

    Route::resource('companies', 'CompanyController')->only('index', 'show');
    Route::resource('employees', 'EmployeeController')->only('index', 'show');
    Route::resource('students', 'StudentController', [
        'parameters' => [
            'seeker_profile' => 'student',
        ],
    ])->only('index', 'show');
    Route::resource('payments', 'PaymentController')->only('index', 'show');
    Route::resource('tickets', 'TicketController')->only('index', 'show');
    Route::resource('settings', 'AccountController')->only('index', 'store');
    Route::resource('files', 'FileController')->only('index');
});
