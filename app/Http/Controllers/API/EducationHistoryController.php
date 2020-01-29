<?php

namespace App\Http\Controllers\API;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class EducationHistoryController extends BaseController
{
    protected $profile;
    protected $education_history;

    public function store(Request $request)
    {
        $this->routine();

        return $this->profile->education_history()->create($this->requestField());
    }

    public function update($id, Request $request)
    {
        $this->routine($id);

        $this->education_history->update($this->requestField());

        return $this->profile->education_history()->find($id);
    }

    public function destroy($id)
    {
        $this->routine($id);

        $this->education_history->delete();

        return $this->education_history;
    }

    private function routine($id = null)
    {
        $this->profile = auth()->user()->profile ?? null;

        if (!$this->profile) {
            apiAbort(404);
        }

        if ($id) {
            $this->education_history = $this->profile->education_history()->find($id);

            if (!$this->education_history) {
                apiAbort(404);
            }
        }
    }

    private function requestField()
    {
        return request()->only('school_name', 'faculty', 'major', 'department', 'content', 'historiable_id', 'historiable_type', 'graduated_at');
    }
}