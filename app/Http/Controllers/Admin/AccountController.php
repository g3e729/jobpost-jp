<?php

namespace App\Http\Controllers\Admin;

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
        $class = session()->get('sidebarState', '');

        if ($class == 'toggled') {
        	$class = '';
        }

		session()->put('sidebarState', $class);
	}
}
