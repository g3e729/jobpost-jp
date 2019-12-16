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
			$this->user->account_type = $this->user->hasRole('company') ? 'company' : 'student';

			return $this->user->load('profile');
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}

	public function update(Request $request)
	{
		if ($this->user) {

			$this->user->update($request->only('email', 'japanese_name', 'name'));

			$this->user->profile->update($request->except('email', 'japanese_name', 'name'));

			return $this->user->load('profile');
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}

	public function updatePassword(Request $request)
	{
		if ($this->user) {

			$this->user->update($request->only('password'));

			return $this->user->load('profile');
		}

		return response()->json(['message' => 'Not Found.'], 404);
	}
}
