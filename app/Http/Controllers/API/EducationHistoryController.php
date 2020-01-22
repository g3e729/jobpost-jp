<?php

namespace App\Http\Controllers\API;

use App\Models\EducationHistory as Model;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class EducationHistoryController extends BaseController
{
	public function store(Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		return $profile->education_history()
			->create($request->only('school_name', 'faculty', 'major', 'department', 'content', 'historiable_id', 'historiable_type', 'graduated_at'));
	}

	public function update(Model $education_history, Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		$education_history = $profile->education_history()->find($education_history->id);

		if (!$education_history) {
			return apiAbort(403);
		}

		$education_history->update(
			$request->only('school_name', 'faculty', 'major', 'department', 'content', 'historiable_id', 'historiable_type', 'graduated_at')
		);

		return $profile->education_history()->find($education_history->id);
	}

	public function destroy(Model $education_history)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		$education_history = $profile->education_history()->find($education_history->id);

		if (!$education_history) {
			return apiAbort(404);
		}

		$education_history->delete();

		return $education_history;
	}
}