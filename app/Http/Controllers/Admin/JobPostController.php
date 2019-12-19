<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobPost;
use App\Services\CompanyService;
use App\Services\JobPostService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class JobPostController extends BaseController
{
	public function index(Request $request)
	{
		$job_posts = (new JobPostService)->search($request->except('page'));
        $prefectures = getPrefecture();
		$range = JobPost::getRange();

		return view('admin.job_posts.index', compact('job_posts', 'prefectures', 'range'));
	}

	public function show(JobPost $recruitment)
	{
		$job_post = $recruitment;

		return view('admin.job_posts.show', compact('job_post'));
	}

	public function create(Request $request)
	{
		$company = (new CompanyService)->find($request->get('company_id'));

		if ($request->get('company_id') && ! $company) {
			abort(404);
		}

		$employment_types = JobPost::getEmploymentTypes();
        $prefectures = getPrefecture();
		$range = JobPost::getRange();

		return view('admin.job_posts.create', compact('company', 'employment_types', 'prefectures', 'range'));
	}

	public function store(Request $request)
	{
		$company = (new CompanyService)->find($request->get('company_id'));

		if ($request->get('company_id') && ! $company) {
			abort(403);
		}

		$jobPostService = new JobPostService;
		$jobPostService->setCompany($company);
		$job_post = $jobPostService->createJob($request->except('_token', '_method', 'company_id'));

		return redirect()->route('admin.recruitments.show', $job_post)->withSuccess("Success! A new job has been created!");
	}

	public function edit(JobPost $recruitment)
	{
		$job_post = $recruitment;

		$employment_types = JobPost::getEmploymentTypes();
        $prefectures = getPrefecture();
		$range = JobPost::getRange();

		return view('admin.job_posts.edit', compact('employment_types', 'job_post', 'prefectures', 'range'));
	}

	public function update(JobPost $recruitment, Request $request)
	{
		$job_post = $recruitment;
		
		$jobPostService = (new JobPostService($job_post));
		$jobPostService->updateJob($request->except('_token', '_method', 'company_id'));

		return redirect()->route('admin.recruitments.show', $job_post)->withSuccess("Success! Job detail was updated!");
	}

	public function destroy(JobPost $recruitment)
	{
		$job_post = $recruitment;
		$job_post->delete();

		return redirect()->route('admin.recruitments.index')->withSuccess("Success! Job was deleted!");
	}
}
