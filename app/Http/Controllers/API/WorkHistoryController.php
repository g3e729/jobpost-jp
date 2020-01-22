<?php

namespace App\Http\Controllers\API;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class WorkHistoryController extends BaseController
{
	protected $profile;
	protected $work_history;

	public function store(Request $request)
	{
		$this->routine();

		return $this->profile->work_history()->create($this->requestField());
	}

	public function update($id, Request $request)
	{
		$this->routine($id);

		$this->work_history->update($this->requestField());

		return $this->profile->work_history()->find($id);
	}

	public function destroy($id)
	{
		$this->routine($id);

		$this->work_history->delete();

		return $this->work_history;
	}

	private function routine($id = null)
	{
		$this->profile = auth()->user()->profile ?? null;

		if (!$this->profile) {
			apiAbort(404);
		}

		if ($id) {
			$this->work_history = $this->profile->work_history()->find($id);

			if (!$this->work_history) {
				apiAbort(404);
			}
		}
	}

	private function requestField()
	{
		return request()->only('company_name', 'role', 'content', 'historiable_id', 'historiable_type', 'is_present', 'started_at', 'ended_at');
	}
}