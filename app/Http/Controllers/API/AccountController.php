<?php

namespace App\Http\Controllers\API;

use App\Services\UserService;
use App\Services\CompanyService;
use App\Services\SeekerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
    public function details()
    {
        if (auth()->user()) {
            $user = auth()->user();

            return $this->returnData($user);
        }

        apiAbort(404);
    }

    public function update(Request $request)
    {
        if (auth()->user()) {
            $user = auth()->user();
            $user->update($request->only('email', 'japanese_name', 'name'));

            $profile = $user->profile;

            $profile->update($request->except('email', 'japanese_name', 'name'));

            if ($user->hasRole('seeker')) {
                $service = (new SeekerService($profile));

                $service->updateSkills($request);
            } elseif ($user->hasRole('company')) {
                $service = (new CompanyService($profile));

                if ($request->photos) {
                    $service->wwhPhotoUploader($request->photos);
                }

                if ($request->has('features')) {
                    $company->features()->delete();
                    $features = $request->get('features');

                    foreach ([0, 1, 2] as $i) {
                        $feature = $features[$i];

                        if (empty($feature['title']) && empty($feature['description'])) {
                            continue;
                        }

                        $profile->features()->create($feature);
                    }
                }

                $service->updateSocialMedia($request->get('social_media', []));
            }

            if ($request->file('avatar') || $request->get('avatar_delete')) {
                $service->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
            }

            if ($request->file('cover_photo') || $request->get('cover_photo_delete')) {
                $service->acPhotoUploader($request->cover_photo, 'cover_photo', $request->get('cover_photo_delete'));
            }

            return $this->returnData($user);
        }

        apiAbort(404);
    }

    public function updatePassword(Request $request)
    {
        if (auth()->user()) {
            $user = auth()->user();
            $user->update($request->only('password'));

            return $this->returnData($user);
        }

        apiAbort(404);
    }

    private function returnData($user = null)
    {
        if (!$user) {
            $user = auth()->user();
        }

        $user->account_type = $user->hasRole('company') ? 'company' : 'student';
        $profile = $user->profile;

        if ($user->account_type == 'company') {
            $profile->features = $profile->features ?? [];
        }

        if ($user->account_type == 'student') {
            $profile->load('educationHistory');
            $profile->load('workHistory');
        }

        $profile->portfolios = $profile->portfolios ?? [];

        $user->profile = $profile;

        return $user;
    }
}
