<?php

namespace App\Http\Controllers\API;

use App\Services\SeekerService as ModelService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    protected $user;
    protected $student;
    protected $profile;

	public function index(Request $request)
	{
        $this->routine();

		return (new ModelService)->search(
            searchInputs(),
            $request->get('paginated', true),
            $request->get('sort', 'ASC')
        )->each(function ($student) {
            $student->applied = $this->setApplied($student);
        });
	}

    public function show($id)
    {
        $this->routine($id);

        return $this->student;
    }

	public function update($id, Request $request)
	{
        $this->routine($id);

        $seekerService = new ModelService($this->student);

        $seekerService->update($request->except('_token', '_method', 'email', 'japanese_name', 'name'));
        $seekerService->updateUser($request->only('email', 'japanese_name', 'name'));

        $seekerService->updateWorkHistory($request->get('work_history'));
        $seekerService->updateEducationHistory($request->get('education_history'));

        if ($request->file('avatar') || $request->get('avatar_delete')) {
            $seekerService->acPhotoUploader($request->avatar, 'avatar', $request->get('avatar_delete'));
        }

        if ($request->file('cover_photo') || $request->get('cover_photo_delete')) {
            $seekerService->acPhotoUploader($request->cover_photo, 'cover_photo', $request->get('cover_photo_delete'));
        }

        $seekerService->updateSkills($request);

        if ($request->has('portfolios')) {
            (new PortfolioService)->insertOrUpdate($this->student, $request->portfolios);
        }
        
        return (new ModelService)->show($this->student->id);
	}

    public function getStudentFilters(Request $request)
    {
        return (new ModelService)->studentFilters();
    }

    private function routine($id = null)
    {
        $this->user = auth()->user();

        $this->profile = $this->user->profile ?? null;
        $this->job_ids = [];

        if ($this->user && $this->user->hasRole('company')) {
            $this->job_ids = $this->user->profile->jobPosts->pluck('id')->toArray();
        }

        if ($id) {
            $this->student = (new ModelService)->show($id);

            $this->student->applied = $this->setApplied($this->student);

            if (!$this->student) {
                apiAbort(404);
            }
        }

        if (in_array(request()->getMethod(), ['PATCH', 'DELETE'])) {

            if (!$this->profile || $this->profile->id != $this->student->id) {
                apiAbort(403);
            }
        }
    }

    private function setApplied($student)
    {
        $applied_job_ids = $student->applications->pluck('job_post_id')->toArray();
        return count(array_intersect($applied_job_ids, $this->job_ids)) ? true : false;
    }
}
