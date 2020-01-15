<?php

namespace App\Services;

use App\Models\JobPost as ServiceModel;
use App\Models\CompanyProfile;
use Exception;

class JobPostService extends BaseService
{
    protected $company;
    protected $item;

    public function __construct($item = null, CompanyProfile $company = null)
    {
        parent::__construct(ServiceModel::class);

        if ($item instanceof ServiceModel) {
            $this->item = $item;
            $this->company = $item->company;
        } elseif ($company) {
            $this->company = $company;
        }
    }

    public function show($id)
    {
        return ServiceModel::with('company')->popular()
            ->whereId($id)
            ->first();
    }

    public function createJob($fields = [])
    {
        try {
    		$this->item = $this->company->jobPosts()->create($fields);

    		if (isset($fields['cover_photo']) && $fields['cover_photo']) {
    			$this->acPhotoUploader($fields['cover_photo'], 'cover_photo');
    		}

    		return $this->item;
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $e->getMessage());
        }
    }

    public function updateJob($fields = [])
    {
        try {
            $this->item->update($fields);

            if (isset($fields['cover_photo_delete']) && $fields['cover_photo_delete']) {
                $this->acPhotoUploader(null, 'cover_photo', 1);
            }

            if (isset($fields['cover_photo']) && $fields['cover_photo']) {
                $this->acPhotoUploader($fields['cover_photo'], 'cover_photo');
            }

            return $this->item;
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $e->getMessage());
        }
    }

    public function search($fields, $paginated = true, $sort = 'DESC')
    {
        try {
            $fields = array_filter($fields);
            $que = (new $this->model)->with('company')->popular();

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

            $sort = empty($sort) ? 'DESC' : strtoupper($sort);

            switch ($sort) {
                case 'DESC':
                case 'ASC':
                    $que = $que->orderBy('created_at', $sort);
                break;
                case 'POPULAR':
                    $que = $que->orderByDesc('likes_count');
                break;
            }
            
            return $this->toReturn($que, $paginated);
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return $this->toReturn();
        }
    }

    public function jobFilters()
    {
        $jobs = ServiceModel::get();

        $frameworks = $jobs->groupBy(function ($item, $key) {
            return $item->framework;
        })->keys();

        $positions = $jobs->groupBy(function ($item, $key) {
            return $item->position;
        })->keys();

        $programming_languages = $jobs->groupBy(function ($item, $key) {
            return $item->programming_language;
        })->keys();

        $regions = getPrefecture();

        $status = ServiceModel::getEmploymentTypes();

        return collect(compact('frameworks', 'positions', 'programming_languages', 'regions', 'status'));
    }

    public function setCompany(CompanyProfile $company)
    {
    	$this->company = $company;
    }
}
