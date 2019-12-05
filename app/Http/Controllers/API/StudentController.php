<?php

namespace App\Http\Controllers\API;

use App\Models\SeekerProfile as Student;
use App\Services\SeekerService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    protected $user = null;

    public function __construct(Request $request)
    {
        $this->user = (new UserService)->findApiToken($request->get('api_token'));
    }
    
	public function index(Request $request)
	{
        dd($request->all());
		$students = (new SeekerService)->search($request->except('_token', 'page'));

		return $students;
	}

	public function show(Student $student)
	{
		return $student;
	}

	public function update(Student $student, Request $request)
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
}
