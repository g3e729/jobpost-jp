<?php

namespace App\Http\Controllers\API;

use App\Models\JobPost;
use App\Services\JobPostService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class JobPostController extends BaseController
{
	protected $user = null;

	public function __construct()
	{
		$this->user = (new UserService)->findApiToken(request()->get('api_token'));
	}
	
	public function index(Request $request)
	{
		$jobs = (new JobPostService)->search($request->except('_token', 'page'));

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
