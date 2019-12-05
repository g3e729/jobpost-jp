<?php

namespace App\Services;

use App\Models\User;
use App\Services\RoleService;
use Exception;

class UserService extends BaseService
{
    // single model
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(User::class);

        if ($item instanceof User) {
            $this->item = $item;
        }
    }

    public function findEmail($email)
    {
        $this->item = User::whereEmail($email)->first();

        return $this->item;
    }

    public function findApiToken($api_token = null)
    {
        if (! $api_token) {
            return null;
        }

        $this->item = User::apiToken($api_token)->first();

        return $this->item;
    }

    public function attachRole($slug)
    {
        if (! $this->item) {
            return false;
        }

        $role = (new RoleService)->findSlug($slug);

        if ($role) {
            $this->item->roles()->detach();
            $this->item->roles()->attach($role->id);

            return true;
        }

        return false;
    }

    public function destroy()
    {
        $profile = $this->item->profile;

        // delete file in storage
        $profile->files()->delete();
        $profile->delete();

        return $this->item->delete();
    }
}
