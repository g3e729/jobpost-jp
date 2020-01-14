<?php

namespace App\Http\Controllers\API;

use App\Models\JobPost as Model;
use App\Services\JobPostService as ModelService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class JobPostController extends BaseController
{
	public function index(Request $request)
	{
		$jobs = (new ModelService)->search(
			$request->except('_token', 'page', 'sort'),
			true,
			$request->get('sort')
		);

		return $jobs;
	}

	public function show(Model $job)
	{
		return (new ModelService)->show($job->id);
	}

	public function store(Request $request)
	{
		return (new ModelService(null, auth()->user()->profile))->createJob($request->all());
	}

	public function update(Model $job, Request $request)
	{
		$company = auth()->user()->profile;

		if ($job->company_profile_id != $company->id) {
			abort(503);
		}

		$jobPostService = (new ModelService($job));
		$jobPostService->updateJob($request->except('_token', '_method', 'company_id'));

		return (new ModelService)->show($job->id);
	}

	public function getJobFilters(Request $request)
	{
		$filters = (new ModelService)->jobFilters();

		return $filters;
	}
}
