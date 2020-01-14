<?php

namespace App\Http\Controllers\API;

use App\Models\SeekerProfile as Model;
use App\Services\SeekerService as ModelService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
	public function index(Request $request)
	{
		$students = (new ModelService)->search($request->except('_token', 'page'));

		return $students;
	}

    public function show(Model $student)
    {
        return (new ModelService)->show($student->id);
    }

	public function update(Model $student, Request $request)
	{
        $seekerService = new ModelService($student);

        switch ($request->get('type')) {
            case 'basic':
                $seekerService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
                $seekerService->updateUser($request->only('email', 'japanese_name', 'name'));
            break;
            case 'work_history':
                $seekerService->updateWorkHistory($request->get('work_history'));
            break;
            case 'education_history':
                $seekerService->updateEducationHistory($request->get('education_history'));
            break;
            case 'movie':
                $seekerService->update($request->except('_token', '_method'));
            break;
            case 'photo':
                if ($request->file('avatar') || $request->get('avatar_delete')) {
                    $seekerService->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
                }

                if ($request->file('cover_photo') || $request->get('cover_photo_delete')) {
                    $seekerService->acPhotoUploader($request->cover_photo, 'cover_photo', $request->get('cover_photo_delete'));
                }
            break;
            case 'skills':
                $seekerService->updateSkills($request);
            break;
            case 'portfolios':
                if ($request->has('portfolios')) {
                    (new PortfolioService)->insertOrUpdate($student, $request->portfolios);
                }
            break;
        }
        
        return (new ModelService)->show($student->id);
	}

    public function getStudentFilters(Request $request)
    {
        $filters = (new ModelService)->studentFilters();

        return $filters;
    }
}
