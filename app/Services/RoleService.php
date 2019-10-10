<?php

namespace App\Services;

use App\Models\Role;
use App\Services\UserService;
use Exception;

class RoleService extends BaseService
{
    // single model
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(Role::class);

        if ($item instanceof Role) {
            $this->item = $item;
        }
    }

    public function findSlug($slug)
    {
        return Role::whereSlug($slug)->first();
    }
}
