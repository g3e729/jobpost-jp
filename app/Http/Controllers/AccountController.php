<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
	public function index()
	{
		return redirect()->route('admin.students.index');
		return view('admin.index');
	}

	public function toggleSidebar(Request $request)
	{
        $status = session()->get('sidebarState');

		if (auth()->check()) {
			session()->put('sidebarState', $class);
		}
	}
}
