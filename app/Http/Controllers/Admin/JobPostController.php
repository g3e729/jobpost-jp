<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobPost;
use App\Services\CompanyService;
use App\Services\JobPostService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;

class JobPostController extends BaseController
{
	public function index(Request $request)
	{
		$filters = (new JobPostService)->jobFilters()->toArray();
		$job_posts = (new JobPostService)->search($request->except('page'), true, 'DESC', true);

		$data = array_merge($filters, compact('job_posts'));

		return view('admin.job_posts.index', $data);
	}

	public function show($id)
	{
		$job_post = JobPost::withTrashed()->find($id);

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

	public function store(JobPostRequest $request)
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

	public function edit($id)
	{
		$job_post = JobPost::withTrashed()->find($id);

		$employment_types = JobPost::getEmploymentTypes();
        $prefectures = getPrefecture();
		$range = JobPost::getRange();

		return view('admin.job_posts.edit', compact('employment_types', 'job_post', 'prefectures', 'range'));
	}

	public function update($id, Request $request)
	{
		$job_post = JobPost::withTrashed()->find($id);
		
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
