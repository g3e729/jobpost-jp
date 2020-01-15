<?php

namespace App\Http\Controllers\API;

use App\Services\JobPostService;
use App\Services\SeekerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ApplyController extends BaseController
{
	public function store(Request $request)
	{
		$user = auth()->user();

		$seekerService = (new SeekerService($user->profile));
		$job_post = (new JobPostService)->find($request->get('job_post_id'));

		if (!$seekerService->getItem() || !$job_post) {
			return apiAbort(404);
		}

		return $seekerService->applyJobPost($job_post);
	}
}
