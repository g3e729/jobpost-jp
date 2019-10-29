<?php

namespace App\Services;

use App\Models\User;
use App\Models\EmployeeProfile;
use App\Services\UserService;
use Exception;

class EmployeeService extends BaseService
{
    // single model
    protected $item;
    protected $user;

    public function __construct($item = null)
    {
        parent::__construct(EmployeeProfile::class);

        if ($item instanceof EmployeeProfile) {
            $this->item = $item;
        }
    }

    public function create($fields = [])
    {
        $this->createUser($fields);

        if (! $this->user) {
            return null;
        }

        $profile_fields = array_except($fields, ['name', 'email', 'password']);

        if (! count($profile_fields)) {
            return $this->item;
        }

        if ($this->user->profile) {
            $this->user->profile->update($profile_fields);
        } else {
            $this->user->profile()->create($profile_fields);
        }

        $this->user = $this->user->load('profile');
        $this->item = $this->user->profile;

        return $this->item;
    }

    private function createUser($fields = [])
    {
        $userService = (new UserService);
        $user = $userService->findEmail($fields['email']);

        if (! $user) {
            $user = $userService->create(array_only($fields, ['name', 'email', 'password']));

            $userService->attachRole($this->model::ROLE);
        }

        $this->user = $user;
    }
}
