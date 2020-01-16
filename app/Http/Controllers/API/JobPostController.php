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
			$request->except('_token', 'page', 'sort', 'paginated', 'sort_by'),
            $request->get('paginated', true),
			$request->get('sort', 'DESC')
		);

		return $jobs;
	}

	public function show($id)
	{
		return $this->getJob($id);
	}

	public function store(Request $request)
	{
		return (new ModelService(null, auth()->user()->profile))->createJob($request->all());
	}

	public function update(Model $job, Request $request)
	{
		$company = auth()->user()->profile ?? null;

		if (!$company || $job->company_profile_id != $company->id) {
			return apiAbort(503);
		}

		$jobPostService = (new ModelService($job));
		$jobPostService->updateJob($request->except('_token', '_method', 'company_id'));

		return (new ModelService)->show($job->id);
	}

	public function destroy(Model $job)
	{
		$company = auth()->user()->profile ?? null;

		if (!$company || $job->company_profile_id != $company->id) {
			return apiAbort(503);
		}

		$job->delete();

		return $job;
	}

	public function restore($id)
	{
		$job = $this->getJob($id);

        if ($job instanceof Model) {

			$company = auth()->user()->profile ?? null;

			if (!$company || $job->company_profile_id != $company->id) {
				return apiAbort(503);
			}

			$job->restore();

			return $job;
        }

		return apiAbort(503);
	}

    public function companyJobs(Request $request)
    {
		$company = auth()->user()->profile ?? null;

    	return (new ModelService(null, $company))->getCompanyJobs(
    		$request->get('status'),
    		$request->get('paginated', true),
			$request->get('sort', 'DESC')
    	);
    }

	public function getJobFilters(Request $request)
	{
		$filters = (new ModelService)->jobFilters();

		return $filters;
	}

	private function getJob($id)
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
}
