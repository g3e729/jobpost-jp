<?php

namespace App\Http\Controllers\Employee;

use App\Services\EmployeeService;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FileController extends BaseController
{
	public function index(Request $request)
	{
		$files = (new FileService)->search($request->except('page'));

		return view('employee.files.index', compact('files'));
	}
}
