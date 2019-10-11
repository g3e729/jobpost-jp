<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeekerProfile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index()
	{
		return view('admin.students.index');
	}
	
	public function show(SeekerProfile $seeker_profile)
	{
		return view('admin.students.show');
	}
	
	public function edit(/*SeekerProfile $seeker_profile*/)
	{
		return view('admin.students.edit');
	}
	
	public function update(Request $request/*, SeekerProfile $seeker_profile*/)
	{
		return redirect()->route('admin.students.show', $seeker_profile);
	}
}
