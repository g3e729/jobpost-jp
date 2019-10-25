<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeProfile as Employee;
use App\Services\EmployeeService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class EmployeeController extends BaseController
{
	public function index()
	{
    $employees = (new EmployeeService)->all();
    $faker = Faker::create('ja_JP');

    return view('admin.employees.index', compact('employees', 'faker'));
	}
	
	public function show(Employee $employee)
	{
		$employee = (new EmployeeService)->setAttribute($employee);

		return view('admin.employees.show', compact('employee'));
	}
	
	public function edit(Employee $employee)
	{
		$employee = (new EmployeeService)->setAttribute($employee);

		return view('admin.employees.show', compact('employee'));
	}
	
	public function update(Request $request, Employee $employee)
	{
		return redirect()->route('admin.employees.show', $employee);
	}
}
