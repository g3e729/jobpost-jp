<?php

namespace App\Http\Controllers\API;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index(Request $request)
	{
		$students = (new SeekerService)->search($request->except('_token'));

        $students->each(function ($item) {
            $item->forApi();
        });

		return $students;
	}
	
	public function show(Student $student)
	{
		return $student->forApi();
	}
}
