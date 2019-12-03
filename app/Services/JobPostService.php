<?php

namespace App\Services;

use App\Models\JobPost;
use App\Models\CompanyProfile;
use Exception;

class JobPostService extends BaseService
{
    protected $company;
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(JobPost::class);

        if ($item instanceof JobPost) {
            $this->item = $item;
        }
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

    public function setCompany(CompanyProfile $company)
    {
    	$this->company = $company;
    }
}
