<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyProfile as Company;
use App\Services\CompanyService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class CompanyController extends BaseController
{
	public function index()
	{
    $companies = (new CompanyService)->all();
    $faker = Faker::create('ja_JP');

		return view('admin.companies.index', compact('companies', 'faker'));
	}
	
	public function show(Company $company)
	{
		$company = (new CompanyService)->setAttribute($company);

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