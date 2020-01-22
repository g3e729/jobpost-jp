<?php

namespace App\Http\Controllers\API;

use App\Models\Feature;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class FeatureController extends BaseController
{
	public function store(Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		return $profile->features()->create($request->only('title', 'description'));
	}

	public function update(Feature $feature, Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		$feature = $profile->features()->find($feature->id);

		if (!$feature) {
			return apiAbort(403);
		}

		$feature->update($request->only('title', 'description'));

		return $profile->features()->find($feature->id);
	}
}