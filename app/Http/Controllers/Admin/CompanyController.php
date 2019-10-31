<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyProfile as Company;
use App\Services\CompanyService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
	public function index(Request $request)
	{
		$companies = (new CompanyService)->search($request->all());
		$industries = Company::getIndustries();
        $prefectures = getPrefecture();

		return view('admin.companies.index', compact('companies', 'industries', 'prefectures'));
	}
	
	public function show(Company $company)
	{
		return view('admin.companies.show', compact('company'));
	}
	
	public function edit(Company $company)
	{
		$company = (new CompanyService)->setAttribute($company);

		return view('admin.companies.show', compact('company'));
	}
	
	public function update(Request $request, Company $company)
	{
		return redirect()->route('admin.companies.show', $company);
	}
}
