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
				$request->get('scouted', null),
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

		$application = $this->seekerService->applyJobPost($this->job_post, $request->get('scouted', false));

		return $application ?? apiAbort(404);
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
			apiAbort(404);
		}

		if ($this->user->hasRole('company') && $request->has('seeker_profile_id')) {
			$this->seekerService = (new SeekerService);
			$this->seekerService->find(request()->get('seeker_profile_id'));
		}

		if ($this->user->hasRole('seeker')) {
			$this->seekerService = (new SeekerService($this->user->profile));
		}

		$this->job_post = (new JobPostService)->find($request->get('job_post_id'));

		if (!$this->seekerService->getItem() || !$this->job_post) {
			apiAbort(404);
		}

		return true;
	}

}
