<?php

namespace App\Http\Controllers\API;

use App\Services\CompanyService;
use App\Models\CompanyProfile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
	public function index()
	{
		return (new CompanyService)->all()->toJson();
	}
	
	public function show(CompanyProfile $company)
	{
		$company = (new CompanyService)->setAttribute($company);

		return $company->toJson();
	}
}
