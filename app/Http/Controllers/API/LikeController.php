<?php

namespace App\Http\Controllers\API;

use App\Services\CompanyService;
use App\Services\JobPostService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class LikeController extends BaseController
{
	public function like(Request $request)
	{
		if (auth()->user()) {
			$type = $request->get('type');
			$type_id = $request->get('type_id');

			$model = $this->getModel($type, $type_id);

			if ($model) {
				$model = $this->toggleLike($model);

				return response()->json(['total' => $model->likes()->count()], 200);
			}
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}

	private function getModel($type = null, $type_id = null)
	{
		$service = null;
		$type = strtolower($type);

		switch ($type) {
			case 'company':
				$service = (new CompanyService);
			break;
			case 'job':
				$service = (new JobPostService);
			break;
		}

		if (! $service) {
			return null;
		}

		return $service->find($type_id);
	}

	private function toggleLike($model)
	{

		$que = $model->likes()->where('user_id', auth()->user()->id);

		if ($que->count()) {
			$que->delete();
		} else {
			$model->likes()->create([
				'user_id' => auth()->user()->id
			]);
		}

		return $model;
	}
}
