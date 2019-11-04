<?php

namespace App\Http\Controllers\API;

use App\Models\SeekerProfile;
use App\Services\SeekerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index(Request $request)
	{
		return (new SeekerService)->search($request->except('_token'))->forApi();
	}
	
	public function show(SeekerProfile $seeker_profile)
	{
		return $seeker_profile->forApi();
	}
}
