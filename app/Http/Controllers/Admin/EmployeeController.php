<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EmployeeRequest;
use App\Models\EmployeeProfile as Employee;
use App\Services\EmployeeService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EmployeeController extends BaseController
{
	public function index(Request $request)
	{
        $countries = getCountries();
        $employment_status = Employee::getEmploymentStatus();
        $positions = Employee::getPositions();
        
		$employees = (new EmployeeService)->search($request->except('page'));

	    return view('admin.employees.index', compact('countries', 'employees', 'employment_status', 'positions'));
	}
	
	public function show(Employee $employee)
	{
		return view('admin.employees.show', compact('employee'));
	}
	
	public function edit(Employee $employee)
	{
        $countries = getCountries();
        $employment_status = Employee::getEmploymentStatus();
        $positions = Employee::getPositions();
        $prefectures = getPrefecture();

		return view('admin.employees.edit', compact('employee', 'countries', 'employment_status', 'positions', 'prefectures'));
	}
	
	public function update(Employee $employee, EmployeeRequest $request)
	{
        $employeeService = new EmployeeService($employee);
        $employeeService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
        $employeeService->updateUser($request->only('email', 'japanese_name', 'name'));

        if ($request->file('avatar') || $request->get('avatar_delete')) {
            $employeeService->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
        }

		return redirect()->route('admin.employees.show', $employee)
            ->with('success', "Success! Employee details is updated!");
	}
    
    public function destroy(Employee $employee)
    {
        $userService = (new UserService($employee->user));
        $userService->destroy();

        return redirect()->route('admin.employees.index')
            ->with('success', "Success! Employee is deleted!");
    }
}
