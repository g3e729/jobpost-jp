<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeekerProfile as Student;
use App\Services\PortfolioService;
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
		
		$students = (new SeekerService)->search($request->only('search', 'course_id', 'english_level_id', 'status', 'from', 'to'));

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

		switch ($step) {
			case 1:
			case 4:
				$student_status = $student->getStudentStatus();
				$occupations = $student->getOccupations();
				$countries = getCountries();
				$courses = $student->getCourses();
				$prefectures = getPrefecture();
				$english_levels = $student->getEnglishLevels();
			break;
			case 3:
				$experiences = $student->getExperiences();
				$frameworks = $student->getFrameworks();
				$languages = $student->getLanguages();
				$others = $student->getOthers();
				$programming_languages = $student->getProgrammingLanguages();
				$rates = skillRate();
			break;
		}

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
			'courses',
			'countries',
			'english_levels',
			'experiences',
			'frameworks',
			'languages',
			'occupations',
			'others',
			'prefectures',
			'programming_languages',
			'rates',
			'step',
			'student',
			'student_status'
		));
	}

	public function update(Request $request, Student $student)
	{
		$skills = array_merge(
			$student->getEnglishLevels()->toArray(),
			$student->getExperiences()->toArray(),
			$student->getFrameworks()->toArray(),
			$student->getLanguages()->toArray(),
			$student->getOthers()->toArray(),
			$student->getProgrammingLanguages()->toArray()
		);

		$skills = array_keys($skills);
		$student->skills()->delete();

		foreach($request->only($skills) as $skill_id => $skill_rate) {

			if ($skill_rate) {
				$student->skills()->create(compact('skill_id', 'skill_rate'));
			}
			
		}
		
		$seekerService = new SeekerService($student);

		$seekerService->updateInfo($request->all());
		$seekerService->updateWorkHistory($request->get('work_history'));
		$seekerService->updateEducationHistory($request->get('education_history'));
		$seekerService->uploadFile($request);

        if ($request->has('portfolios')) {
            (new PortfolioService)->insertOrUpdate($student, $request->portfolios);
        }

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
