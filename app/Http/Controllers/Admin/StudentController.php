<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index(Request $request)
	{
		$search = $request->get('search', null);

		if (! empty($search)) {
			$students = (new SeekerService)->search($search);
		} else {
			$students = (new SeekerService)->all();
		}
		
		return view('admin.students.index', compact('search', 'students'));
	}
	
	public function show(Student $student)
	{
		$student = (new SeekerService)->setAttribute($student);

		return view('admin.students.show', compact('student'));
	}
	
	public function edit(Student $student)
	{
		$student = (new SeekerService)->setAttribute($student);

		return view('admin.students.edit', compact('student'));
	}
	
	public function update(Request $request, Student $student)
	{
		return redirect()->route('admin.students.show', $student);
	}
}
