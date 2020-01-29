<?php

namespace App\Http\Controllers\Employee;

use App\Models\EmployeeProfile as Employee;
use App\Services\EmployeeService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    public function index(Request $request)
    {
        $countries = getCountries();
        $employment_status = Employee::getEmploymentStatus();
        $positions = Employee::getPositions();

        $employees = (new EmployeeService)->search($request->except('page'));

        return view('employee.employees.index', compact('countries', 'employees', 'employment_status', 'positions'));
    }

    public function show(Employee $employee)
    {
        return view('employee.employees.show', compact('employee'));
    }
}
