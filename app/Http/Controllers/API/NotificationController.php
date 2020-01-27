<?php

namespace App\Http\Controllers\API;

use App\Models\Notification;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class NotificationController extends BaseController
{
	public function index(Request $request)
	{
		$user = auth()->user();

		if ($user) {
			$paginate = $request->has('all') ? 0 : 1;

			$notifications = $user->notifications()
				->select('id', 'title', 'description', 'published_at', 'seen')
				->orderBy('published_at', 'ASC');

			$unseen_total = $user->notifications()->where('seen', 0)->count();

			if ($paginate) {
				$notifications = $notifications->paginate(10);
				return compact('notifications', 'unseen_total');
			}

			$notifications = $notifications->get();
			return compact('notifications', 'unseen_total');
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}

	public function update(Request $request)
	{
		if (auth()->user()) {
			$ids = $request->get('ids');
			$ids = explode(',', $ids);

			auth()->user()->notifications()->update(['seen' => 1]);

			return ['success' => true];
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}
}
