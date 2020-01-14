<?php

namespace App\Http\Controllers\API;

use App\Models\CompanyProfile as Model;
use App\Services\CompanyService as ModelService;
use App\Services\PortfolioService;
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
        $companyService = new ModelService($company);

        switch ($request->get('type')) {
            case 'basic':
                $companyService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                $companyService->updateUser($request->only('email', 'japanese_name', 'name'));
                $companyService->updateSocialMedia($request->get('social_media', []));
            break;
            case 'photo':
                if ($request->file('avatar') || $request->get('avatar_delete')) {
                    $companyService->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
                }
                
                if ($request->file('cover_photo') || $request->get('cover_photo_delete')) {
                    $companyService->acPhotoUploader($request->cover_photo, 'cover_photo', $request->get('cover_photo_delete'));
                }
            break;
            case 'features':
                $companyService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                
                if ($request->photos) {
                    $companyService->wwhPhotoUploader($request->photos);
                }
            break;
            case 'features':
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
            break;
            case 'portfolio':
                if ($request->has('portfolios')) {
                    (new PortfolioService)->insertOrUpdate($company, $request->portfolios);
                }
            break;
        }

        return (new ModelService)->show($company->id);
	}

    public function getCompanyFilters(Request $request)
    {
        $filters = (new ModelService)->companyFilters();

        return $filters;
    }
}
