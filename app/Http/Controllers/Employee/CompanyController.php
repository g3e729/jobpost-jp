<?php

namespace App\Http\Controllers\Employee;

use App\Models\CompanyProfile as Company;
use App\Services\CompanyService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    public function index(Request $request)
    {
        $prefectures = getPrefecture();
        $industries = Company::getIndustries();

        $companies = (new CompanyService)->search($request->except('page'));

        return view('employee.companies.index', compact('companies', 'industries', 'prefectures'));
    }

    public function show(Company $company)
    {
        return view('employee.companies.show', compact('company'));
    }
}
