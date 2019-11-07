<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\InvitationRequest;
use App\Models\Invitation;
use App\Mail\SendInvite;

class InvitationController extends BaseController
{
	public function create()
	{
		$types = Invitation::getTypes();

		return view('admin.invite', compact('types'));
	}
	
	public function store(InvitationRequest $request)
	{
		$invitation = Invitation::create($request->only('email', 'type'));

		return back()->with('success', "Success! Invitation was sent to {$invitation->email}");
	}
}
