<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CompanyRequest;
use App\Models\CompanyProfile as Company;
use App\Services\CompanyService;
use App\Services\PortfolioService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CompanyController extends BaseController
{
	public function index(Request $request)
	{
        $prefectures = getPrefecture();
        $industries = Company::getIndustries();
        
		$companies = (new CompanyService)->search($request->except('page'));

		return view('admin.companies.index', compact('companies', 'industries', 'prefectures'));
	}
	
	public function show(Company $company)
	{
		return view('admin.companies.show', compact('company'));
	}
	
	public function edit(Company $company, Request $request)
	{
      	$step = $request->get('step', 1);
		$data = compact('company', 'step');

      	switch ($step) {
            case 1:
                $countries = getCountries();
                $industries = Company::getIndustries();
                $prefectures = getPrefecture();

                $data = array_merge($data, compact('company', 'countries', 'industries', 'prefectures'));
            break;
      		case 2:
      		break;
      	}

		return view('admin.companies.edit', $data);
  	}
	
	public function update(Company $company, CompanyRequest $request)
	{
        $companyService = new CompanyService($company);

        switch ($request->get('step')) {
            case 1:
                $companyService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                $companyService->updateUser($request->only('email', 'japanese_name', 'name'));
                $companyService->updateSocialMedia($request->get('social_media', []));

                if ($request->file('avatar') || $request->get('avatar_delete')) {
                    $companyService->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
                }

                if ($request->file('cover_photo') || $request->get('cover_photo_delete')) {
                    $companyService->acPhotoUploader($request->cover_photo, 'cover_photo', $request->get('cover_photo_delete'));
                }
            break;
            case 2:
                $companyService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                
                if ($request->photos) {
                    $companyService->wwhPhotoUploader($request->photos);
                }

                if ($request->has('features')) {
                    $company->features()->delete();
                    $features = $request->get('features');

                    foreach([0, 1, 2] as $i) {
                        $feature = $features[$i];

                        if (empty($feature['title']) && empty($feature['description'])) {
                            continue;
                        }

                        $company->features()->create($feature);
                    }
                }

                if ($request->has('portfolios')) {
                    (new PortfolioService)->insertOrUpdate($company, $request->portfolios);
                }
            break;
        }

        return redirect()->route('admin.companies.show', $company)
            ->withSuccess("Success! Employee details is updated!");
	}
    
    public function destroy(Company $company)
    {
        $userService = (new UserService($company->user));
        $userService->destroy();

        return redirect()->route('admin.companies.index')
            ->withSuccess("Success! Company is deleted!");
    }
}
