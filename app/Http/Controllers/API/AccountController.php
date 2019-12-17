<?php

namespace App\Http\Controllers\API;

use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
	protected $user = null;

	public function __construct()
	{
		$this->user = (new UserService)->findApiToken(request()->get('api_token'));
	}
	
	public function details()
	{
		if ($this->user) {
			$user = $this->user;
			$user->account_type = $user->hasRole('company') ? 'company' : 'student';
			$user->profile = $user->profile;

			return $user;
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}

	public function update(Request $request)
	{
		if ($this->user) {
			$user = $this->user;
			$user->update($request->only('email', 'japanese_name', 'name'));
			$user->profile->update($request->except('email', 'japanese_name', 'name'));
			$user->profile = $user->profile;

			return $user;
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}

	public function updatePassword(Request $request)
	{
		if ($this->user) {
			$user = $this->user;
			$user->update($request->only('password'));
			$user->profile = $user->profile;

			return $user;
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}
}
