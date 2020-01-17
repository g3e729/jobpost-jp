<?php

namespace App\Http\Controllers\API;

use App\Model\CompanyProfile;
use App\Model\SeekerProfile;
use App\Services\CompanyService;
use App\Services\JobPostService;
use App\Services\SeekerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ApplyController extends BaseController
{
	protected $user;
	protected $seekerService;
	protected $job_post;

	public function index(Request $request)
	{	
		$user = auth()->user();
		$profile = $user->profile ?? null;
		$applications = [];

		if ($user->hasRole('seeker')) {
			$applications = (new SeekerService($profile))->getAppliedJobs(
				$request->get('search'),
	            $request->get('paginated', true),
				$request->get('sort', 'DESC')
			);
		} elseif ($user->hasRole('company')) {
			$applications = (new CompanyService($profile))->getApplicants(
				$request->get('search'),
	            $request->get('paginated', true),
				$request->get('sort', 'DESC')
			);
		}

		return $applications;
	}

	public function store(Request $request)
	{
		$status = $this->setItems($request);
		
		if ($status !== true) {
			return $status;
		}

		return $this->seekerService->applyJobPost($this->job_post);
	}

	public function destroy(Request $request)
	{
		$status = $this->setItems($request);
		
		if ($status !== true) {
			return $status;
		}

		return $this->seekerService->cancelApplication($this->job_post);
	}

	private function setItems($request)
	{
		$this->user = auth()->user();

		if (!$this->user) {
			return apiAbort(404);
		}

		$this->seekerService = (new SeekerService($this->user->profile));
		$this->job_post = (new JobPostService)->find($request->get('job_post_id'));

		if (!$this->seekerService->getItem() || !$this->job_post) {
			return apiAbort(404);
		}

		return true;
	}

}
