<?php

namespace App\Http\Controllers\Auth;

use App\Models\Invitation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
    	$invitation = Invitation::where('code', $request->get('code'))->first();

    	if (! $invitation) {
    		abort(404);
    	}

    	$type = Invitation::getTypes($invitation->type);

    	return view('register.'.$type);
    }

    public function store()
    {
    	
    }
}
