<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

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
			'step')
		);
	}

	public function update(Request $request, Student $student)
	{
        $student->update(
            $request->except('_token', '_method', 'email', 'japanese_name', 'name')
        );

        $student->user()->update(
            $request->only('email', 'japanese_name', 'name')
        );

        $works = $request->get('work_history');

        if ($works && count(array_filter(array_flatten($works, 1)))) {
        	$student->work_history()->delete();

        	foreach($works as $work) {
        		$work['started_at'] = Str::finish($work['started_at'], '-01');
        		$work['ended_at'] = Str::finish($work['ended_at'], '-01');
        		$student->work_history()->create($work);
        	}
        }

        $educations = $request->get('education_history');

        if ($educations && count(array_filter(array_flatten($educations, 1)))) {
        	$student->education_history()->delete();

        	foreach($educations as $education) {
        		$education['graduated_at'] = Str::finish($education['graduated_at'], '-01');
        		$student->education_history()->create($education);
        	}
        }

        if ($request->file('avatar')) {
            $file = $request->avatar->store('public/avatar');
            $file = explode('/', $file);

            $student->files()->delete();

            $student->files()->create([
                'url' => asset('/storage/avatar/' . array_last($file)),
                'file_name' => $request->avatar->getClientOriginalName(),
                'type' => 'avatar',
                'mime_type' => $request->avatar->getMimeType(),
                'size' => $request->avatar->getSize(),
            ]);
        }

		return redirect()->route('admin.students.show', $student)
            ->with('success', "Success! Student details is updated!");

		return redirect()->route('admin.students.show', $student);
	}

    public function destroy(Student $student)
    {
        $userService = (new UserService($student->user));
        $userService->destroy();

        return redirect()->route('admin.students.index')
            ->with('success', "Success! Student is deleted!");
    }
}
