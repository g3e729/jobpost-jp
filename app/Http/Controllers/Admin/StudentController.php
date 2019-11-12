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

	public function edit(Student $student, Request $request)
	{
    $step = $request->get('step', 1);
    $student_status = $student->getStudentStatus();
    $occupations = $student->getOccupations();
    $experiences = $student->getExperiences();
    $countries = getCountries();
    $courses = $student->getCourses();
    $prefectures = getPrefecture();


		return view('admin.students.edit', compact(
      'student',
      'student_status',
      'occupations',
      'experiences',
      'courses',
      'countries',
      'prefectures',
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
