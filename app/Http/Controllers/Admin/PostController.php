<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeProfile;
use App\Models\SeekerProfile;
use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PostController extends BaseController
{
	public function index()
	{
		$posts = Post::orderBy('created_at')->get();

		return view('admin.posts.index', compact('posts'));
	}

	public function show(Post $post)
	{
		return view('admin.posts.show', compact('post'));
	}

	public function create(Request $request)
	{
        $employment_status = EmployeeProfile::getEmploymentStatus();
        $prefectures = getPrefecture();

		return view('admin.posts.create', compact('employment_status', 'prefectures'));
	}

	public function store(Request $request)
	{
		dd('store', $request->all());
	}

	public function edit(Post $post)
	{
		return view('admin.posts.edit', compact('post'));
	}

	public function update(Post $post, Request $request)
	{
		dd('update', $post, $request->all());
	}

	public function destroy(Post $post)
	{
		dd('destroy', $post);
	}
}
