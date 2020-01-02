<?php

namespace App\Http\Controllers\API;

use App\Models\JobPost;
use App\Services\JobPostService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class JobPostController extends BaseController
{
	public function index(Request $request)
	{
		$jobs = (new JobPostService)->search(
			$request->except('_token', 'page', 'sort'), 
			true, 
			$request->get('sort')
		);

		return $jobs;
	}

	public function show(JobPost $job)
	{
		return $job;
	}
	
	public function getJobFilters(Request $request)
	{
		$filters = (new JobPostService)->jobFilters();

		return $filters;
	}
}
