<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;

class NotificationController extends BaseController
{
	public function index()
	{
		$notifications = Notification::groupBy('group_id')->get();

		return view('admin.notifications.index', compact('notifications'));
	}

	public function show(Notification $notification)
	{
		$notifications = Notification::whereGroupId($notification->group_id)->get();

		return view('admin.notifications.show', compact('notification', 'notifications'));
	}

	public function edit(Notification $notification)
	{
		$genres = Notification::getGenres();
		$targets = Notification::getTargets();

		return view('admin.notifications.edit', compact('genres', 'targets', 'notification'));
	}

	public function create()
	{
		$genres = Notification::getGenres();
		$targets = Notification::getTargets();

		return view('admin.notifications.create', compact('genres', 'targets'));
	}
	
	public function store(Request $request)
	{
		$role_slugs = [];
		$target_id = $request->get('target_id');

		if ($target_id == 'companies' || $target_id == 'all') {
			$role_slugs[] = 'company';
		}

		if ($target_id == 'students' || $target_id == 'all') {
			$role_slugs[] = 'seeker';
		}

		$users = User::whereHas('roles', function ($q) use ($role_slugs) {
			$q->whereIn('slug', $role_slugs);
		})->get();

		$field_org = $request->only('title', 'description', 'genre_id', 'published_at', 'target_id');
		$field_org['group_id'] = substr(md5(now()), 0, 8);

		foreach ($users as $user) {
			$notification = $user->notifications()->create($field_org);
		}

		return redirect()->back()
			->with('success', "Success! Notication sent to {$users->count()} users and will be notified on {$notification->published_at->format('Y年m月d日')}!");
	}

	public function update(Notification $notification, Request $request)
	{
		$notifications = Notification::whereGroupId($notification->group_id);
		$total = $notifications->count();
		$notifications->update($request->only('title', 'description', 'genre_id', 'published_at', 'target_id'));

		return redirect()->route('admin.notifications.show', $notification)
			->with('success', "Success! {$total} notications was updated!");
	}

	public function destroy(Notification $notification)
	{
		$notifications = Notification::whereGroupId($notification->group_id);
		$total = $notifications->count();
		$notifications->delete();


        return redirect()->route('admin.notifications.index')
            ->with('success', "Success! {$total} notifications are deleted!");
	}
}
