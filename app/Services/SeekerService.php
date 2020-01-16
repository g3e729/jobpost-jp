<?php

namespace App\Services;

use App\Models\JobPost;
use App\Models\SeekerProfile as ServiceModel;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class SeekerService extends BaseService
{
    // single model
    protected $item;
    protected $user;

    public function __construct($item = null)
    {
        parent::__construct(ServiceModel::class);
        
        if ($item instanceof ServiceModel) {
            $this->item = $item;
            $this->user = $item->user;
        }
    }

    public function show($id)
    {
        return ServiceModel::popular()
            ->whereId($id)
            ->first();
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

    public function updateWorkHistory($works = [])
    {
        if (! $this->item || empty($works)) {
            return null;
        }

        try {
            if (count(array_filter(array_flatten($works, 1)))) {
                $this->item->work_history()->delete();

                foreach($works as $k => $work) {
                    $start = isset($work['started_at']) ? explode('-', $work['started_at']) : null;
                    $end = isset($work['ended_at']) ? explode('-', $work['ended_at']) : null;
                    $work['started_at'] = null;
                    $work['ended_at'] = null;

                    if ($start) {
                        $work['started_at'] = now()->createFromDate($start[0], $start[1], 1);
                    }

                    if ($start) {
                        $work['ended_at'] = now()->createFromDate($end[0], $end[1], 1);
                    }

                    $this->item->work_history()->create($work);
                }
            }
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }

        return $this->item;
    }

    public function updateEducationHistory($educations = [])
    {
        if (! $this->item || empty($educations)) {
            return null;
        }

        try {
            if (count(array_filter(array_flatten($educations, 1)))) {
                $this->item->education_history()->delete();

                foreach($educations as $education) {
                    if (empty($education['school_name']) && empty($education['content'])) {
                        continue;
                    }

                    $graduate = isset($work['graduated_at']) ? explode('-', $work['graduated_at']) : null;
                    $education['graduated_at'] = null;

                    if ($graduate) {
                        $education['graduated_at'] = now()->createFromDate($graduate[0], $graduate[1], 1);
                    }

                    $this->item->education_history()->create($education);
                }
            }
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }

        return $this->item;
    }

    public function updateSkills(Request $request)
    {
        $skills = array_merge(
            $this->item->getEnglishLevels()->toArray(),
            $this->item->getExperiences()->toArray(),
            $this->item->getFrameworks()->toArray(),
            $this->item->getLanguages()->toArray(),
            $this->item->getOthers()->toArray(),
            $this->item->getProgrammingLanguages()->toArray()
        );

        $skills = array_keys($skills);
        $this->item->skills()->delete();

        foreach($request->only($skills) as $skill_id => $skill_rate) {
            if ($skill_rate) {
                $this->item->skills()->create(compact('skill_id', 'skill_rate'));
            }
        }
    }
    
    public function search($fields, $paginated = true, $sort = 'ASC')
    {
        try {
            $fields = array_filter($fields);
            $status = array_get($fields, 'status');
            $fields = array_except($fields, 'status');
            $que = (new $this->model)->popular();

            switch ($status) {
                case 1:
                    $que = $que->where('enrollment_date', '>', now());
                break;
                case 2:
                    $enrollment_date = now()->startOfMonth();
                    $graduation_date = now()->endOfMonth();
                    $from = explode('-', array_get($fields, 'from'));
                    $to = explode('-', array_get($fields, 'to'));

                    if ($from && count($from) > 1) {
                        $enrollment_date = $enrollment_date->createFromDate($from[0], $from[1], 1)->subDay();
                    }

                    if ($to && count($to) > 1) {
                        $graduation_date = $graduation_date->createFromDate($to[0], $to[1], 1)->endOfMonth()->addDay();
                    }

                    $que = $que->where('enrollment_date', '>', $enrollment_date)
                        ->where('graduation_date', '<', $graduation_date);
                break;
                case 3:
                    $grad_1 = now()->startOfMonth();
                    $grad_2 = now()->endOfMonth();
                    $from = explode('-', array_get($fields, 'from'));
                    $to = explode('-', array_get($fields, 'to'));

                    if ($from && count($from) > 1) {
                        $grad_1 = $grad_1->createFromDate($from[0], $from[1], 1)->startOfMonth()->subDay();
                    }

                    if ($to && count($to) > 1) {
                        $grad_2 = $grad_2->createFromDate($to[0], $to[1], 1)->endOfMonth()->addDay();
                    }

                    $que = $que->where('graduation_date', '>', $grad_1)
                        ->where('graduation_date', '<', $grad_2);
                break;
            }

            foreach ($fields as $column => $value) {
                if (in_array($column, ['from', 'to'])) {
                    continue;
                }

                switch ($column) {
                    case 'search':
                        $que = $que->search($fields['search']);
                    break;
                    default:
                        $que = $que->where($column, $value);
                    break;
                }
            }

            if (request()->has('sort_by')) {
                $que = $que->orderBy(request()->get('sort_by'), $sort);
            } else {
                $que = $que->join('users', 'seeker_profiles.user_id', '=', 'users.id')
                    ->orderBy('users.name', $sort);
            }
            
            return $this->toReturn($que, $paginated);
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return $this->toReturn();
        }
    }

    public function applyJobPost(JobPost $job_post)
    {
        $que = $this->item->applications()->whereJobPostId($job_post->id);
        if (!$que->count()) {
            return $this->item->applications()->create([
                'job_post_id' => $job_post->id
            ]);
        }

        return $que->first();
    }

    public function studentFilters()
    {
        $experiences = ServiceModel::getExperiences();
        $frameworks = ServiceModel::getFrameworks();
        $languages = ServiceModel::getLanguages();
        $others = ServiceModel::getOthers();
        $programming_languages = ServiceModel::getProgrammingLanguages();

        return compact('experiences', 'frameworks', 'languages', 'others', 'programming_languages');
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
