<?php

namespace App\Http\Controllers\API;

// use App\Services\StudentService;
use App\Models\SeekerProfile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index()
	{
		return null;
		// return (new StudentService)->all()->toJson();
	}
	
	public function show(SeekerProfile $seeker_profile)
	{
		return null;
		// return $seeker_profile->toJson();
	}
}
