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
			$request->except('_token', 'page', 'sort', 'paginated'),
            $request->get('paginated', true),
			$request->get('sort')
		);

		return $jobs;
	}

	public function show($id)
	{
		$company = auth()->user()->profile ?? null;
			
		$job = (new ModelService(null, $company))->show($id);

		if ($job->deleted_at != null) {

			if ($company && $company->id == $job->company_profile_id) {
				return $job;
			}
		} else {
			return $job;
		}

        return apiAbort(404);
	}

	public function store(Request $request)
	{
		return (new ModelService(null, auth()->user()->profile))->createJob($request->all());
	}

	public function update(Model $job, Request $request)
	{
		$company = auth()->user()->profile;

		if ($job->company_profile_id != $company->id) {
			return apiAbort(503);
		}

		$jobPostService = (new ModelService($job));
		$jobPostService->updateJob($request->except('_token', '_method', 'company_id'));

		return (new ModelService)->show($job->id);
	}

	public function destroy(Model $job)
	{
		$job->delete();
	}

    public function companyJobs(Request $request)
    {
		$company = auth()->user()->profile;

    	return (new ModelService(null, $company))->getCompanyJobs(
    		$request->get('status'),
    		$request->get('paginated', true),
			$request->get('sort')
    	);
    }

	public function getJobFilters(Request $request)
	{
		$filters = (new ModelService)->jobFilters();

		return $filters;
	}
}
