<?php

namespace App\Services;

use App\Models\SeekerProfile;
use App\Services\UserService;
use Exception;

class SeekerService extends BaseService
{
    // single model
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(SeekerProfile::class);
        
        if ($item instanceof SeekerProfile) {
            $this->item = $item;
        }
    }

    public function setAttribute($data = null)
    {
        function setter($item)
        {
            $user = $item->user;
            $item->email = $user->email;
            $item->name = $user->name;

            return $item;
        }

        if ($data instanceof SeekerProfile) {
            return setter($data);
        }

        $data->each(function ($item) {
            $item = setter($item);
        });

        return $data;
    }

    public function all()
    {
        try {
            return $this->setAttribute(parent::all());
        } catch (Exception $e) {
            return $e;
        }
    }

    public function create($fields = [])
    {
        $userService = (new UserService);
        $user = $userService->findEmail($fields['email']);

        if (! $user) {
            $this->item = $userService->create(array_only($fields, ['name', 'email', 'password']));

            $userService->attachRole($this->model::ROLE);
            $this->item->profile()->create(array_except($fields, ['name', 'email', 'password']));

            return $this->item->profile;
        }

        return null;
    }
}
