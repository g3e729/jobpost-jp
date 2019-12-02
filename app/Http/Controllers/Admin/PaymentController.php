<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Transaction;

class PaymentController extends BaseController
{
	public function index()
	{
		$selectRaw = ['*',
			'COUNT(*) as items',
	    	'COUNT(IF(is_approved = 1, 1, NULL)) as total_approved',
			'sum(amount) as total',
		];

		$data = Transaction::selectRaw(implode(',', $selectRaw))
			->groupBy('transactionable_id')
			->groupBy(\DB::raw('YEAR(created_at)-MONTH(created_at)'))
			->orderBy('created_at', 'DESC')
			->get();

		$approved = collect([]);
		$not_approved = collect([]);

		foreach($data as $payment) {
			if ($payment->total_approved == $payment->items) {
				$approved->prepend($payment);
			} else {
				$not_approved->prepend($payment);
			}
		}

		$payments = collect(compact('approved', 'not_approved'));

		return view('admin.payments.index', compact('payments'));
	}

	public function show(Transaction $payment)
	{
		$between = [$payment->created_at->firstOfMonth(), $payment->created_at->endOfMonth()];
		$transactionable = $payment->transactionable;

		$transactions = $transactionable->transactions()->withTrashed()->whereBetween('created_at', $between)->get();
		$is_approved = $transactions->where('is_approved', 1)->count() == $transactions->where('deleted_at', '!=', null)->count();

		$payment = (object) [
			'id' => $payment->id,
			'bill_date' => $between[0]->format('Y年m月分'),
			'transactionable' => $transactionable,
			'tickets' => $transactions->where('type', 'ticket'),
			'subscription_total' => $transactions->where('type', 'subscription')->sum('amount'),
			'ticket_total' => $transactions->where('type', 'ticket')->where('deleted_at', null)->sum('amount'),
			'total' => $transactions->sum('amount'),
			'is_approved' => $is_approved,
		];

		return view('admin.payments.show', compact('payment'));
	}

	public function update(Transaction $payment)
	{
		$between = [$payment->created_at->firstOfMonth(), $payment->created_at->endOfMonth()];
		$transactionable = $payment->transactionable;

		$is_approved = ! $payment->is_approved ? 1 : 0;


		$transactionable->transactions()->whereBetween('created_at', $between)->update(compact('is_approved'));

		return back()->with('success', "Success! Payment succesfully approved!");
	}

	public function destroy(Transaction $payment)
	{
		$transactionable = $payment->transactionable;

		dd($payment);

		$transactionable->transactions()->whereBetween('created_at', $between)->delete();

		return back()->with('success', "Success! Ticket succesfully deleted!");
	}
}
