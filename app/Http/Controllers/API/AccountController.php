<?php

namespace App\Http\Controllers\API;

use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
	public function details()
	{
		if (auth()->user()) {
			$user = auth()->user();

			return $this->returnData($user);
		}

		return apiAbort(404);
	}

	public function update(Request $request)
	{
		if (auth()->user()) {
			$user = auth()->user();
			$user->update($request->only('email', 'japanese_name', 'name'));
			$user->profile->update($request->except('email', 'japanese_name', 'name'));

			return $this->returnData($user);
		}

		return apiAbort(404);
	}

	public function updatePassword(Request $request)
	{
		if (auth()->user()) {
			$user = auth()->user();
			$user->update($request->only('password'));

			return $this->returnData($user);
		}

		return apiAbort(404);
	}

	private function returnData($user = null)
	{
		if (!$user) {
			$user = auth()->user();
		}

		$user->account_type = $user->hasRole('company') ? 'company' : 'student';
		$user->profile = $user->profile;

		return $user;
	}
}
