<?php

namespace App\Http\Controllers\API;

use App\Models\SeekerProfile as Model;
use App\Services\SeekerService as ModelService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index(Request $request)
	{
		$students = (new ModelService)->search($request->except('_token', 'page'));

		return $students;
	}

    public function show(Model $student)
    {
        return (new ModelService)->show($student->id);
    }

	public function update(Model $student, Request $request)
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
	}

    public function getStudentFilters(Request $request)
    {
        $filters = (new ModelService)->studentFilters();

        return $filters;
    }
}
