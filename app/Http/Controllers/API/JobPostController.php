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
		$user = auth()->user();

		if ($user && !$user->hasRole('company')) {
			abort(404);
		}

		$company = $user->profile;

		return (new ModelService(null, $company))->createJob($request->all());
	}

	public function getJobFilters(Request $request)
	{
		$filters = (new ModelService)->jobFilters();

		return $filters;
	}
}
