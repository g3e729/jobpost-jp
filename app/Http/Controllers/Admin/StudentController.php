<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index()
	{
		$students = (new SeekerService)->all();
		
		return view('admin.students.index', compact('students'));
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
