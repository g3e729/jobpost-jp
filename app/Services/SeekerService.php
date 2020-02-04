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
        return ServiceModel::with('educationHistory', 'workHistory')
            ->popular()
            ->applied()
            ->selectRaw("TIMESTAMPDIFF(YEAR, DATE(birthday), current_date) AS age")
            ->whereId($id)
            ->first();
    }

    public function create($fields = [])
    {
        $this->createUser($fields);

        if (!$this->user) {
            return null;
        }

        $profile_fields = array_except($fields, ['name', 'japanese_name', 'email', 'password']);

        if (!count($profile_fields)) {
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
        if (!$this->item || empty($works)) {
            return null;
        }

        try {
            if (count(array_filter(array_flatten($works, 1)))) {
                $this->item->work_history()->delete();

                foreach ($works as $k => $work) {
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
        if (!$this->item || empty($educations)) {
            return null;
        }

        try {
            if (count(array_filter(array_flatten($educations, 1)))) {
                $this->item->education_history()->delete();

                foreach ($educations as $education) {
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
        $student_skills = $this->item->skills;
        $skills = array_merge(
            $this->item->getCourses()->toArray(),
            $this->item->getEnglishLevels()->toArray(),
            $this->item->getExperiences()->toArray(),
            $this->item->getFrameworks()->toArray(),
            $this->item->getLanguages()->toArray(),
            $this->item->getOthers()->toArray(),
            $this->item->getProgrammingLanguages()->toArray()
        );

        $skills = array_keys($skills);
        // $this->item->skills()->delete();

        foreach ($request->only($skills) as $skill_id => $skill_rate) {
            $skill_rate = $skill_rate ?? 1;

            $skill = $student_skills->where('skill_id', $skill_id)->first();

            if ($skill) {
                $skill->update(compact('skill_rate'));
            } else {
                $this->item->skills()->create(compact('skill_id', 'skill_rate'));
            }
        }

        return true;
    }

    public function search($fields, $paginated = true, $sort = 'ASC')
    {
        try {
            $fields = array_filter($fields);
            $status = array_get($fields, 'status');
            $fields = array_except($fields, 'status');
            $que = (new $this->model)->popular()->applied()
                ->selectRaw("TIMESTAMPDIFF(YEAR, DATE(birthday), current_date) AS age");

            switch ($status) {
                case 1:
                    $que = $que->where('enrollment_date', '>', now());
                    break;
                case 2:
                    $enrollment_date = now()->startOfMonth();
                    $from = !empty(array_get($fields, 'from')) ? explode('-', array_get($fields, 'from')) : [];
                    $to = !empty(array_get($fields, 'to')) ? explode('-', array_get($fields, 'to')) : [];

                    if ($from && count($from) > 1) {
                        $enrollment_date = $enrollment_date->createFromDate($from[0], $from[1], 1)->subDay();
                    }

                    $graduation_date = $enrollment_date->copy()->endOfMonth();

                    if ($to && count($to) > 1) {
                        $graduation_date = $graduation_date->createFromDate($to[0], $to[1], 1)->endOfMonth()->addDay();
                    }

                    if (count($from)) {
                        $que = $que->where('enrollment_date', '>', $enrollment_date)
                            ->where('graduation_date', '<', $graduation_date);
                    } else {
                        $que = $que->where('enrollment_date', '<', now()->startOfDay());
                    }

                    break;
                case 3:
                    $grad_1 = now()->startOfMonth();
                    $from = !empty(array_get($fields, 'from')) ? explode('-', array_get($fields, 'from')) : [];
                    $to = !empty(array_get($fields, 'to')) ? explode('-', array_get($fields, 'to')) : [];

                    if ($from && count($from) > 1) {
                        $grad_1 = $grad_1->createFromDate($from[0], $from[1], 1)->startOfMonth()->subDay();
                    }

                    $grad_2 = $grad_1->copy()->endOfMonth();

                    if ($to && count($to) > 1) {
                        $grad_2 = $grad_2->createFromDate($to[0], $to[1], 1)->endOfMonth()->addDay();
                    }

                    if (count($from)) {
                        $que = $que->where('graduation_date', '>', $grad_1)
                            ->where('graduation_date', '<', $grad_2);
                    } else {
                        $que = $que->where('graduation_date', '<', now()->startOfDay());
                    }

                    break;
            }

            $user = auth()->user();

            foreach ($fields as $column => $value) {
                if (in_array($column, ['from', 'to'])) {
                    continue;
                }

                switch ($column) {
                    case 'search':
                        $que = $que->search($fields['search']);
                        break;
                    case 'scouted':
                        if ($user->hasRole('company')) {
                            $que = $que->whereHas('applications', function ($q) use ($user) {
                                $q->where('scouted', true)
                                    ->whereHas('job_post', function ($q) use ($user) {
                                        $q->where('company_profile_id', $user->profile->id ?? 0);
                                    });
                            });
                        }
                        break;
                    case 'liked':
                        if ($user->hasRole('company')) {
                            $que = $que->whereHas('likes', function ($q) use ($user) {
                                $q->where('user_id', $user->id);
                            });
                        }
                        break;
                    case 'applied':
                        if ($user->hasRole('company')) {
                            $que = $que->whereHas('applications', function ($q) use ($user) {
                                $q->where('scouted', false)
                                    ->whereHas('job_post', function ($q) use ($user) {
                                        $q->where('company_profile_id', $user->profile->id ?? 0);
                                    });
                            });
                        }
                        break;
                    case 'age':
                        $que = $que->agedBetween($value);
                        break;
                    case 'study_abroad_fee':
                        $que = $que->studyFee($value);
                        break;
                    default:
                        $que = $que->where($column, $value);
                        break;
                }
            }

            // if (request()->has('sort_by')) {
            //     $que = $que->orderBy(request()->get('sort_by'), $sort);
            // } else {
            //     $que = $que->join('users', 'seeker_profiles.user_id', '=', 'users.id')
            //         ->orderBy('users.name', $sort);
            // }

            $que = $que->orderBy(request()->get('sort_by', 'created_at'), $sort);

            return $this->toReturn($que, $paginated);
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return $this->toReturn();
        }
    }

    public function getAppliedJobs($search, $paginated = true, $sort = 'DESC')
    {
        $que = $this->item->applications()->with('chat_channel')->where('scouted', request()->get('scouted', 0));

        $que = $que->search($search, $this->item);

        return $this->toReturn($que, $paginated);
    }

    public function applyJobPost(JobPost $job_post, bool $scouted = false)
    {
        $auth_user = auth()->user();

        if ($scouted && (!$auth_user->hasRole('company') || $job_post->company_profile_id != $auth_user->profile->id)) {
            return null;
        }

        $que = $this->item->applications()->whereJobPostId($job_post->id);

        if (!$que->count()) {
            $this->item->applications()->create([
                'job_post_id' => $job_post->id,
                'scouted'     => $scouted
            ]);

            if ($scouted && $auth_user->hasRole('company')) {
                $available_tickets = $auth_user->profile->available_tickets - 1;

                $auth_user->profile->update(compact('available_tickets'));
            }
        }


        return $que->first();
    }

    public function cancelApplication(JobPost $job_post)
    {
        return $this->item->applications()->whereJobPostId($job_post->id)->delete();
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

        if (!$user) {
            $user = $userService->create(array_only($fields, ['name', 'japanese_name', 'email', 'password']));

            $userService->attachRole($this->model::ROLE);
        }

        $this->user = $user;
    }
}
