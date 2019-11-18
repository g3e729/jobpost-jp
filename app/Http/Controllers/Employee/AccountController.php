<?php

namespace App\Http\Controllers\Employee;

use App\Http\Requests\Admin\SettingRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
	public function index()
	{
		$profile = auth()->user()->profile;

		return view('employee.settings.index', compact('profile'));
	}

	public function store(SettingRequest $request)
	{
		$user = auth()->user();

		switch ($request->get('type')) {
			case 'avatar':
				$profile = $user->profile;
	            $profile->files()->delete();

				if ($request->file('avatar')) {
		            $file = $request->avatar->store('public/avatar');
		            $file = explode('/', $file);

		            $profile->files()->create([
		                'url' => asset('/storage/avatar/' . array_last($file)),
		                'file_name' => $request->avatar->getClientOriginalName(),
		                'type' => 'avatar',
		                'mime_type' => $request->avatar->getMimeType(),
		                'size' => $request->avatar->getSize(),
		            ]);
		        }
			break;
			case 'password':
				$user->update($request->only('password'));
			break;
		}

		return redirect()->back()->with('message', 'Account successfully updated!');
	}

	public function toggleSidebar(Request $request)
	{
        $class = session()->get('sidebarState', '');

        if ($class == 'toggled') {
        	$class = '';
        } else {
        	$class = 'toggled';
        }

		session()->put('sidebarState', $class);
	}
}
