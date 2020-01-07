<?php

namespace App\Http\Controllers\API;

use App\Services\JobPostService;
use App\Services\CompanyService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
	public function search(Request $request)
	{
		$search = strtolower($request->get('search'));

		$jobs = (new JobPostService)->search(compact('search'), 'que')->paginate(config('site_settings.per_page'), null, 'jobs_page');
		$companies = (new CompanyService)->search(compact('search'), 'que')->paginate(config('site_settings.per_page'), null, 'companies_page');

		return compact('jobs', 'companies');
	}
}
