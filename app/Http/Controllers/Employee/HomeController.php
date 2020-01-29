<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return redirect()->route('employee.students.index');
        return view('employee.index');
    }
}
