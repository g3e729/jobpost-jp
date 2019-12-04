<?php

namespace App\Http\Controllers\API;

use App\Models\JobPost;
use App\Services\JobPostService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class JobPostController extends BaseController
{
	public function index(Request $request)
	{
		$jobs = (new JobPostService)->search($request->except('_token', 'page'));

		return $jobs;
	}

	public function show(JobPost $jobs)
	{
		return $jobs;
	}
}
