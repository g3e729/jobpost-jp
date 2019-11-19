<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use App\Services\UserService;
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

		return view('admin.students.index', compact('courses', 'english_levels', 'statuses', 'students'));
	}

	public function show(Student $student)
	{
		$experiences = Student::getExperiences();
		$frameworks = Student::getFrameworks();
		$languages = Student::getLanguages();
		$others = Student::getOthers();
		$programming_languages = Student::getProgrammingLanguages();

		return view('admin.students.show', compact(
			'experiences',
			'frameworks',
			'languages',
			'others',
			'programming_languages',
			'student')
		);
	}

	public function edit(Student $student, Request $request)
	{
		$step = $request->get('step', 1);
		$student_status = $student->getStudentStatus();
		$occupations = $student->getOccupations();
		$countries = getCountries();
		$courses = $student->getCourses();
		$prefectures = getPrefecture();

		$english_levels = $student->getEnglishLevels();
		$experiences = $student->getExperiences();
		$frameworks = $student->getFrameworks();
		$languages = $student->getLanguages();
		$others = $student->getOthers();
		$programming_languages = $student->getProgrammingLanguages();

		if (! $student->work_history->count()) {
			$student->work_history->push([]);
		}

		foreach ([0, 1, 2] as $i) {
			if ($student->education_history[$i]->id ?? false) {
				continue;
			}

			$student->education_history->push([]);
		}

		return view('admin.students.edit', compact(
			'english_levels',
			'student',
			'student_status',
			'occupations',
			'courses',
			'countries',
			'prefectures',
			'experiences',
			'frameworks',
			'languages',
			'others',
			'programming_languages',
			'step'
		));
	}

	public function update(Request $request, Student $student)
	{
		dd($request->all());
		$seekerService = new SeekerService($student);

		$seekerService->updateInfo($request->all());
		$seekerService->updateWorkHistory($request->get('work_history'));
		$seekerService->updateEducationHistory($request->get('education_history'));
		$seekerService->uploadFile($request);

		return redirect()->route('admin.students.show', $student)
            ->with('success', "Success! Student details is updated!");
	}

    public function destroy(Student $student)
    {
        $userService = (new UserService($student->user));
        $userService->destroy();

        return redirect()->route('admin.students.index')
            ->with('success', "Success! Student is deleted!");
    }
}
