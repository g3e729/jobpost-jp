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

    /**
     * Register new model
     *
     * @return mixed
     */
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
}
