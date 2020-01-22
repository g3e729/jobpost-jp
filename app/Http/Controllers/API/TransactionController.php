<?php

namespace App\Http\Controllers\API;

use App\Models\Transaction as Model;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{
	public function store(Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		return $profile->transactions()->create($request->only('amount', 'type', 'type_id', 'description'));
	}

	public function update(Model $transaction, Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		$transaction = $profile->transactions()->find($transaction->id);

		if (!$transaction) {
			return apiAbort(404);
		}

		if ($transaction->is_approved) {
			return apiAbort(403);
		}

		$transaction->update($request->only('amount', 'type', 'type_id', 'description'));

		return $profile->transactions()->find($transaction->id);
	}

	public function destroy(Model $transaction)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		$transaction = $profile->transactions()->find($transaction->id);

		if (!$transaction) {
			return apiAbort(404);
		}

		if ($transaction->is_approved) {
			return apiAbort(403);
		}

		$transaction->delete();

		return $transaction;
	}
}