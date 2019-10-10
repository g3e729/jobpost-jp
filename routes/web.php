<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// $user = App\Models\User::find(4);

// $userService = (new App\Services\UserService);
// $userService->create([
// 	'name' => 'LIG PH',
// 	'email' => 'recruitment@lig.com.ph',
// 	'password' => 'password',
// ]);

// $userService->attachRole('company');


Route::get('/', function () {
	return view('admin.index');
})->name('admin.index');

Route::get('/companies', function () {
	return view('admin.companies.index');
})->name('admin.companies.index');

Route::get('/invite', function () {
	return view('admin.invite');
})->name('admin.invite');

Route::get('/profile', function () {
	return view('admin.profile');
})->name('admin.profile');

Route::get('/recruitments', function () {
	return view('admin.posts.index');
})->name('admin.recruitments.index');

Route::get('/staffs', function () {
	return view('admin.employees.index');
})->name('admin.staffs.index');

Route::get('/students', function () {
	return view('admin.students.index');
})->name('admin.students.index');
