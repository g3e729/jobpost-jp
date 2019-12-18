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
		if (auth()->user()) {
			$paginate = $request->has('all') ? 0 : 1;

			$notifications = auth()->user()->notifications()
				->select('id', 'title', 'description', 'published_at', 'seen')
				->orderBy('published_at', 'ASC');

			if ($paginate) {
				return $notifications->paginate(10);
			}

			return $notifications->get();
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
