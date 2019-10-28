<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
	public function index()
	{
		return redirect()->route('admin.students.index');
		return view('admin.index');
	}
}
