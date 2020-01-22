<?php

namespace App\Http\Controllers\API;

use App\Models\WorkHistory as Model;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class WorkHistoryController extends BaseController
{
	public function store(Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		return $profile->work_history()
			->create($request->only('company_name', 'role', 'content', 'historiable_id', 'historiable_type', 'is_present', 'started_at', 'ended_at'));
	}

	public function update(Model $work_history, Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		$work_history = $profile->work_history()->find($work_history->id);

		if (!$work_history) {
			return apiAbort(403);
		}

		$work_history->update(
			$request->only('company_name', 'role', 'content', 'historiable_id', 'historiable_type', 'is_present', 'started_at', 'ended_at')
		);

		return $profile->work_history()->find($work_history->id);
	}

	public function destroy(Model $work_history)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		$work_history = $profile->work_history()->find($work_history->id);

		if (!$work_history) {
			return apiAbort(404);
		}

		$work_history->delete();

		return $work_history;
	}
}