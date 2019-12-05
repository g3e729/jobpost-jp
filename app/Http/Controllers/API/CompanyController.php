<?php

namespace App\Http\Controllers\API;

use App\Models\CompanyProfile;
use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
	protected $user = null;

	public function __construct()
	{
		$this->user = (new UserService)->findApiToken(request()->get('api_token'));
	}
	
	public function index(Request $request)
	{
		$companies = (new CompanyService)->search($request->except('_token', 'page'));

		return $companies;
	}

	public function show(CompanyProfile $company)
	{
		return $company;
	}

	public function update(CompanyProfile $company, Request $request)
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
}
