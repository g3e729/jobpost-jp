<?php

namespace App\Http\Controllers\API;

use App\Services\CompanyService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
	public function index()
	{
		$to_return = [
		    'status' => 200,
		    'data' => (new CompanyService)->all()
		];
		
		return response()->json($to_return);
	}
}
