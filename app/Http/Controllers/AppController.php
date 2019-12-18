<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AppController extends BaseController
{
	public function index()
	{
		// $userService = (new UserService);
		// $token = session()->get('api_token');
  //       $userService->findApiToken($token);
		// $userService->generateApiToken();

		return view('app');
	}
}
