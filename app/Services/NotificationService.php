<?php

namespace App\Services;

use App\Models\Notification;
use App\Services\UserService;
use Exception;

class NotificationService extends BaseService
{
    // single model
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(Notification::class);

        if ($item instanceof Notification) {
            $this->item = $item;
        }
    }

    public function search($fields, $paginated = true, $sort = 'DESC', bool $grouped = false)
    {
        try {
            $fields = array_filter($fields);
            $que = (new $this->model);

            $start_at = now()->startOfMonth();
            $from = !empty(array_get($fields, 'from')) ? explode('-', array_get($fields, 'from')) : [];
            $to = !empty(array_get($fields, 'to')) ? explode('-', array_get($fields, 'to')) : [];

            if ($from && count($from) > 1) {
                $start_at = $start_at->createFromDate($from[0], $from[1], 1)->startOfMonth();
            }

            $end_at = $start_at->copy()->endOfMonth();

            if ($to && count($to) > 1) {
                $end_at = $end_at->createFromDate($to[0], $to[1], 1)->endOfMonth();
            }

            if (count($from)) {
                $que = $que->whereBetween('published_at', [$start_at, $end_at]);
            }

            foreach ($fields as $column => $value) {
                if ($column == 'target_id' && $value == 'all' || in_array($column, ['from', 'to'])) {
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

            if ($grouped) {
                $que = $que->groupBy('group_id');
            }

            $sort = empty($sort) ? 'DESC' : strtoupper($sort);
            // $que = $que->orderBy(request()->get('sort_by', 'publushed_at'), $sort);

            return $this->toReturn($que, $paginated);
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return $this->toReturn();
        }
    }

    public function insertAdmin($fields, $target_id = null)
    {
        try {
            $fields['group_id'] = substr(md5(now()), 0, 8);
            $role_slugs = [];

            if ($target_id == 'companies' || $target_id == 'all') {
                $role_slugs[] = 'company';
            }

            if ($target_id == 'students' || $target_id == 'all') {
                $role_slugs[] = 'seeker';
            }

            $users = User::whereHas('roles', function ($q) use ($role_slugs) {
                $q->whereIn('slug', $role_slugs);
            })->get();

            foreach ($users as $user) {
                $notification = $user->notifications()->create($fields);
            }

            return $users->count();
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return 0;
        }
    }

    public function updateAdmin($fields, $group_id = null)
    {
        try {
            $notifications = (new $this->model)->whereGroupId($group_id);
            $total = $notifications->count();
            $notifications->update($fields);

            return $total;
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return 0;
        }
    }
}
