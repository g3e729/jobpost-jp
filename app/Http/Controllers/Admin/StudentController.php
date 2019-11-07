<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index(Request $request)
	{
		$students = (new SeekerService)->search($request->only('search', 'course_id', 'pre_english_level'));
		$courses = Student::getCourses();
		
		return view('admin.students.index', compact('courses', 'students'));
	}
	
	public function show(Student $student)
	{
		return view('admin.students.show', compact('student'));
	}
	
	public function edit(Student $student)
	{
		return view('admin.students.edit', compact('student'));
	}
	
	public function update(Request $request, Student $student)
	{
		return redirect()->route('admin.students.show', $student);
	}
    
    public function destroy(Student $student)
    {
        $userService = (new UserService($student->user));
        $userService->destroy();

        return redirect()->route('admin.employees.index')
            ->with('success', "Success! Student is deleted!");
    }
}
