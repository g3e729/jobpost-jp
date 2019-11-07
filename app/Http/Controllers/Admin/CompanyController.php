<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyProfile as Company;
use App\Services\CompanyService;
use App\Services\UserService;
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
	
	public function edit(Company $company, Request $request)
	{
	    $countries = getCountries();
	    $industries = Company::getIndustries();
	    $prefectures = getPrefecture();

		return view('admin.companies.edit', compact('company', 'countries', 'industries', 'prefectures'));
  	}
	
	public function update(Request $request, Company $company)
	{
		return redirect()->route('admin.companies.show', $company);
	}
    
    public function destroy(Company $company)
    {
        $userService = (new UserService($company->user));
        $userService->destroy();

        return redirect()->route('admin.employees.index')
            ->with('success', "Success! Company is deleted!");
    }
}
