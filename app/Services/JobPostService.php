<?php

namespace App\Services;

use App\Models\JobPost as ServiceModel;
use App\Models\CompanyProfile;
use Exception;

class JobPostService extends BaseService
{
    protected $company;
    protected $item;

    public function __construct($item = null, $company = null)
    {
        parent::__construct(ServiceModel::class);

        if ($item instanceof ServiceModel) {
            $this->item = $item;
            $this->company = $item->company;
        }

        if ($company instanceof CompanyProfile) {
            $this->company = $company;
        }
    }

    public function show($id)
    {
        $que = ServiceModel::with('company')
            ->withTrashed()
            ->popular();

        if ($this->company) {
            $que = $que->numberApplicants()
                ->where('company_profile_id', $this->company->id);
        }

        return $que->whereId($id)->first();
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
                    $que = $que->orderBy(request()->get('sort_by', 'created_at'), $sort);
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

    public function getCompanyJobs(bool $status = null, $paginated = true, $sort = 'DESC')
    {
        try {
            $que = $this->company->jobPosts()
                ->popular()
                ->numberApplicants();

            if ($status === false) {
                $que = $que->onlyTrashed();
            } elseif ($status === true) {
                $que = $que;
            } else {
                $que = $que->withTrashed();
            }

            $que->orderBy(request()->get('sort_by', 'created_at'), $sort);

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
