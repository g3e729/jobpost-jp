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

    public function create($fields = [])
    {
        $this->createUser($fields);

        if (! $this->user) {
            return null;
        }

        $profile_fields = array_except($fields, ['name', 'japanese_name', 'email', 'password']);

        if (! count($profile_fields)) {
            return $this->item;
        }

        if ($this->user->profile) {
            $this->user->profile->update($profile_fields);
        } else {
            $this->user->profile()->create($profile_fields);
        }

        $this->item = $this->model::where('user_id', $this->user->id)->first();

        return $this->item;
    }
    
    public function search($fields, $paginated = true)
    {

        try {
            $fields = array_filter($fields);
            $que = (new $this->model);

            foreach ($fields as $column => $value) {
                switch ($column) {
                    case 'search':
                        $que = $que->search($fields['search']);
                    break;
                    default:
                        $que = $que->where($column, $value);
                    break;
                }
            }

            if ($paginated) {
                return $que->paginate(config('site_settings.per_page'));
            }

            return $que->get();
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return collect([]);
        }
    }

    private function createUser($fields = [])
    {
        $userService = (new UserService);
        $user = $userService->findEmail($fields['email']);

        if (! $user) {
            $user = $userService->create(array_only($fields, ['name', 'japanese_name', 'email', 'password']));

            $userService->attachRole($this->model::ROLE);
        }

        $this->user = $user;
    }
}