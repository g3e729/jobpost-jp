<?php

namespace App\Http\Controllers\Employee;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
	public function index(Request $request)
	{
		$courses = Student::getCourses();
		$statuses = Student::getStudentStatus();
		$english_levels = Student::getEnglishLevels();
		
		$students = (new SeekerService)->search($request->only('search', 'course_id', 'english_level_id', 'status'));

		return view('employee.students.index', compact('courses', 'english_levels', 'statuses', 'students'));
	}

	public function show(Student $student)
	{
		$experiences = Student::getExperiences();
		$frameworks = Student::getFrameworks();
		$languages = Student::getLanguages();
		$others = Student::getOthers();
		$programming_languages = Student::getProgrammingLanguages();

		return view('employee.students.show', compact(
			'experiences',
			'frameworks',
			'languages',
			'others',
			'programming_languages',
			'student')
		);
	}
}
