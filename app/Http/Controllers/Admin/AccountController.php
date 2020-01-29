<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function store(SettingRequest $request)
    {
        $user = auth()->user();
        $user->update($request->only('password'));

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
