<?php

namespace App\Services;

use App\Models\SeekerProfile;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            $status = array_get($fields, 'status');
            $fields = array_except($fields, 'status');
            $que = (new $this->model);

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

            if ($paginated) {
                return $que->paginate(config('site_settings.per_page'));
            }

            return $que->get();
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return collect([]);
        }
    }

    public function updateInfo(array $fields = [])
    {
        if (! $this->item) {
            return null;
        }

        try {
            $this->item->update(array_except($fields, [
                '_token',
                '_method',
                'email',
                'japanese_name',
                'name'
            ]));
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }

        try {
            $this->item->user()->update(array_only($fields, [
                'email',
                'japanese_name',
                'name'
            ]));
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }

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

    public function uploadFile(Request $request)
    {
        if (! $this->item) {
            return null;
        }

        try {
            if ($request->file('avatar')) {
                $file = $request->avatar->store('public/avatar');
                $file = explode('/', $file);

                $this->item->files()->where('type', 'avatar')->delete();

                $this->item->files()->create([
                    'url' => asset('/storage/avatar/' . array_last($file)),
                    'file_name' => $request->avatar->getClientOriginalName(),
                    'type' => 'avatar',
                    'mime_type' => $request->avatar->getMimeType(),
                    'size' => $request->avatar->getSize(),
                ]);
            }
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }

        try {
            if ($request->file('cover_photo')) {
                $file = $request->cover_photo->store('public/cover_photo');
                $file = explode('/', $file);

                $this->item->files()->where('type', 'cover_photo')->delete();

                $this->item->files()->create([
                    'url' => asset('/storage/cover_photo/' . array_last($file)),
                    'file_name' => $request->cover_photo->getClientOriginalName(),
                    'type' => 'cover_photo',
                    'mime_type' => $request->cover_photo->getMimeType(),
                    'size' => $request->cover_photo->getSize(),
                ]);
            }
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }

        return $this->item;
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
