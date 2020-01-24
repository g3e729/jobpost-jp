<?php

namespace App\Http\Controllers\API;

use App\Services\TransactionService as ModelService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{
	protected $profile;
	protected $transaction;

	public function index(Request $request)
	{
		$this->routine();

		return (new ModelService(null, $this->profile))->search(
			searchInputs(),
            $request->get('paginated', true),
			$request->get('sort', 'DESC')
		);
	}

	public function show($id)
	{
		$this->routine();

		return (new ModelService)->find($id);
	}

	public function store(Request $request)
	{
		$this->routine();

		return $this->profile->transactions()->create($this->requestField());
	}

	public function update($id, Request $request)
	{
		$this->routine($id);

		$this->transaction->update($this->requestField());

		return $this->profile->transactions()->find($id);
	}

	public function destroy($id)
	{
		$this->routine($id);

		$this->transaction->delete();

		return $this->transaction;
	}

	private function routine($id = null)
	{
		$this->profile = auth()->user()->profile ?? null;

		if (!$this->profile) {
			apiAbort(404);
		}

		if ($id) {
			$this->transaction = $this->profile->transactions()->find($id);

			if (!$this->transaction) {
				apiAbort(404);
			}

			if ($this->transaction->is_approved) {
				apiAbort(403);
			}
		}
	}

	private function requestField($request = null)
	{
		return request()->only('amount', 'type', 'type_id', 'description');
	}
}