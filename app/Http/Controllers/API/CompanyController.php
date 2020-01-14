<?php

namespace App\Http\Controllers\API;

use App\Models\CompanyProfile as Model;
use App\Services\CompanyService as ModelService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
	public function index(Request $request)
	{
		$companies = (new ModelService)->search($request->except('_token', 'page'));

		return $companies;
	}

	public function show(Model $company)
	{
        return (new ModelService)->show($company->id);
	}

	public function update(Model $company, Request $request)
	{
        $company->update(
            $request->except('_token', '_method', 'email', 'japanese_name', 'name')
        );

        $company->user()->update(
            $request->only('email', 'japanese_name', 'name')
        );

        $social_media_accounts = $request->get('social_media', []);
        $company->social_media()->delete();

        foreach ($social_media_accounts as $social_media => $url) {
        	$company->social_media()->create(compact('social_media', 'url'));
        }

        return $company;
	}

    public function getCompanyFilters(Request $request)
    {
        $filters = (new ModelService)->companyFilters();

        return $filters;
    }
}
