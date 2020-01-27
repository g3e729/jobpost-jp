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
        $user = auth()->user();

        $que = ServiceModel::with('company')
            ->withTrashed()
            ->popular();

        $job = $que->whereId($id)->first();

        if (!$job) {
            return null;
        }

        $job->applied = false;

        if ($user) {
            $applied_tokens = $job->applicants->pluck('applicant.user.api_token')->toArray();
            $job->applied = in_array($user->api_token, $applied_tokens);
        }

        return $job;
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
                    case 'salary':
                        $first = substr($value, 0, 1);
                        $digits = strlen($value);

                        if (strpos($value, '~1') !== false) {
                            $between[] = $first * 10;
                            $between[] = ($first * 10) + 9;
                        }

                        if (strpos($value, '0~') !== false) {
                            $between[] = 1999;
                            $between[] = ($first * 10000000) + 9999;
                        }

                        if ($digits == 3) {
                            $between[] = $first * 100;
                            $between[] = ($first * 100) + 99;
                        }

                        if ($digits == 4) {
                            $between[] = $first * 1000;
                            $between[] = ($first * 1000) + 999;
                        }

                        $que = $que->whereBetween('salary', $between);
                    break;
                    case 'liked':
                        $que = $que->whereHas('likes', function ($q) {
                            $q->where('user_id', auth()->user()->id);
                        });
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
            $que = $this->company
                ->jobPosts()
                ->popular()
                ->numberApplicants();

            if ($status === false) {
                $que = $que->onlyTrashed();
            } elseif ($status === true) {
                $que = $que;
            } else {
                $que = $que->withTrashed();
            }

            $excluded = request()->get('excluded');
            $excluded = empty($excluded) ? [] : explode(',', $excluded);
            $applicants = request()->get('applicants');

            if ($applicants === '1') {
                $que = $que->whereHas('applicants');
            } elseif ($applicants === '0') {
                $que = $que->whereDoesntHave('applicants');
            }

            if (count($excluded)) {
                $que = $que->whereDoesntHave('applicants', function ($q) use ($excluded) {
                    $q->whereIn('seeker_profile_id', $excluded);
                });
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

        $ranges = ServiceModel::getRange();

        return collect(compact('frameworks', 'positions', 'programming_languages', 'regions', 'status', 'ranges'));
    }

    public function setCompany(CompanyProfile $company)
    {
    	$this->company = $company;
    }
}
