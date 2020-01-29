<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StudentRequest;
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
        $data = compact('step', 'student');

        switch ($step) {
            case 1:
            case 4:
                $countries = getCountries();
                $courses = $student->getCourses();
                $english_levels = $student->getEnglishLevels();
                $occupations = $student->getOccupations();
                $prefectures = getPrefecture();
                $student_status = $student->getStudentStatus();

                $data = array_merge($data, compact(
                    'courses',
                    'countries',
                    'english_levels',
                    'occupations',
                    'prefectures',
                    'student_status'
                ));
                break;
            case 2:
                if (!$student->work_history->count()) {
                    $student->work_history->push([]);
                }

                foreach ([0, 1, 2] as $i) {
                    if ($student->education_history[$i]->id ?? false) {
                        continue;
                    }

                    $student->education_history->push([]);
                }
                break;
            case 3:
                $experiences = $student->getExperiences();
                $frameworks = $student->getFrameworks();
                $languages = $student->getLanguages();
                $others = $student->getOthers();
                $programming_languages = $student->getProgrammingLanguages();
                $rates = skillRate();

                $data = array_merge($data, compact(
                    'experiences',
                    'frameworks',
                    'languages',
                    'others',
                    'programming_languages',
                    'rates',
                    'step',
                    'student'
                ));
                break;
        }

        return view('admin.students.edit', $data);
    }

    public function update(Student $student, StudentRequest $request)
    {
        $seekerService = new SeekerService($student);

        switch ($request->get('step')) {
            case 1:
                $seekerService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                $seekerService->updateUser($request->only('email', 'japanese_name', 'name'));
                break;
            case 2:
                $seekerService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                $seekerService->updateWorkHistory($request->get('work_history'));
                $seekerService->updateEducationHistory($request->get('education_history'));

                if ($request->file('avatar') || $request->get('avatar_delete')) {
                    $seekerService->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
                }

                if ($request->file('cover_photo') || $request->get('cover_photo_delete')) {
                    $seekerService->acPhotoUploader($request->cover_photo, 'cover_photo', $request->get('cover_photo_delete'));
                }
                break;
            case 3:
                $seekerService->updateSkills($request);

                if ($request->has('portfolios')) {
                    (new PortfolioService)->insertOrUpdate($student, $request->portfolios);
                }
                break;
            case 4:
                $seekerService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                break;
        }

        return redirect()->route('admin.students.show', $student)
            ->withSuccess("Success! Student details is updated!");
    }

    public function destroy(Student $student)
    {
        $userService = (new UserService($student->user));
        $userService->destroy();

        return redirect()->route('admin.students.index')
            ->withSuccess("Success! Student is deleted!");
    }
}
