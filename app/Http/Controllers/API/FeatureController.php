<?php

namespace App\Http\Controllers\API;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class FeatureController extends BaseController
{
    protected $profile;
    protected $feature;

    public function store(Request $request)
    {
        $this->routine();

        return $this->profile->features()->create($this->requestField());
    }

    public function update($id, Request $request)
    {
        $this->routine($id);

        $this->feature->update($this->requestField());

        return $this->profile->features()->find($id);
    }

    public function destroy($id)
    {
        $this->routine($id);

        $this->feature->delete();

        return $this->feature;
    }

    private function routine($id = null)
    {
        $this->profile = auth()->user()->profile ?? null;

        if (!$this->profile) {
            apiAbort(404);
        }

        if ($id) {
            $this->feature = $this->profile->features()->find($id);

            if (!$this->feature) {
                apiAbort(404);
            }
        }
    }

    private function requestField()
    {
        return request()->only('title', 'description');
    }
}