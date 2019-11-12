<?php

namespace App\Http\Controllers\API;

use App\Models\CompanyProfile;
use App\Services\CompanyService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
	public function index(Request $request)
	{
		return (new CompanyService)->search($request->except('_token'))->forApi();
	}

	public function show(CompanyProfile $company)
	{
		return $company->forApi();
	}
}
