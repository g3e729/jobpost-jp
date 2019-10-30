<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeProfile as Employee;
use App\Services\EmployeeService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class EmployeeController extends BaseController
{
	public function index(Request $request)
	{
        $countries = getCountries();
        $employment_status = Employee::getEmploymentStatus();
        $positions = Employee::getPositions();
		$employees = (new EmployeeService)->search($request->all());

	    return view('admin.employees.index', compact('countries', 'employees', 'employment_status', 'positions'));
	}
	
	public function show(Employee $employee)
	{
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
