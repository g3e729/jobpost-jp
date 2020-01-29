<?php

namespace App\Http\Controllers\API;

use App\Services\CompanyService as ModelService;
use App\Services\PortfolioService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    protected $company;
    protected $profile;

    public function index(Request $request)
    {
        return (new ModelService)->search(
            searchInputs(),
            $request->get('paginated', true),
            $request->get('sort', 'ASC')
        );
    }

    public function show($id)
    {
        $this->routine($id);

        return $this->company;
    }

    public function update($id, Request $request)
    {
        $this->routine($id);

        $companyService = new ModelService($this->company);

        $companyService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
        $companyService->updateUser($request->only('email', 'japanese_name', 'name'));
        $companyService->updateSocialMedia($request->get('social_media', []));

        if ($request->file('avatar') || $request->get('avatar_delete')) {
            $companyService->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
        }

        if ($request->file('cover_photo') || $request->get('cover_photo_delete')) {
            $companyService->acPhotoUploader($request->cover_photo, 'cover_photo', $request->get('cover_photo_delete'));
        }

        if ($request->photos) {
            $companyService->wwhPhotoUploader($request->photos);
        }

        if ($request->has('features')) {
            $this->company->features()->delete();
            $features = $request->get('features');

            foreach ([0, 1, 2] as $i) {
                $feature = $features[$i];

                if (empty($feature['title']) && empty($feature['description'])) {
                    continue;
                }

                $this->company->features()->create($feature);
            }
        }

        if ($request->has('portfolios')) {
            (new PortfolioService)->insertOrUpdate($this->company, $request->portfolios);
        }

        return (new ModelService)->show($this->company->id);
    }

    public function getCompanyFilters(Request $request)
    {
        return (new ModelService)->companyFilters();
    }

    private function routine($id = null)
    {
        $this->company = (new ModelService)->show($id);

        if (!$this->company) {
            apiAbort(404);
        }

        if (in_array(request()->getMethod(), ['PATCH', 'DELETE'])) {

            $this->profile = auth()->user()->profile ?? null;

            if (!$this->profile || $this->profile->id != $this->company->id) {
                apiAbort(403);
            }
        }
    }
}
