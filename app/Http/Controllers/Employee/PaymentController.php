<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Transaction;

class PaymentController extends BaseController
{
	public function index()
	{
		$data = Transaction::selectRaw('
				*,
				COUNT(*) as items,
            	COUNT(IF(is_approved = 1, 1, NULL)) as total_approved,
				created_at,
				sum(amount) as total')
			->groupBy(\DB::raw('YEAR(created_at)-MONTH(created_at)'))
			->orderBy('created_at', 'DESC')
			->get();

		$approved = collect([]);
		$not_approved = collect([]);

		foreach($data as $payment) {
			if ($payment->total_approved == $payment->items) {
				$approved->push($payment);
			} else {
				$not_approved->push($payment);
			}
		}

		$payments = collect(compact('approved', 'not_approved'));

		return view('employee.payments.index', compact('payments'));
	}

	public function show(Transaction $payment)
	{
		$between = [$payment->created_at->firstOfMonth(), $payment->created_at->endOfMonth()];

		$transactions = Transaction::withTrashed()->whereBetween('created_at', $between)->get();
		$is_approved = $transactions->where('is_approved', 1)->count() == $transactions->where('deleted_at', null)->count();

		$payment = (object) [
			'bill_date' => $between[0]->format('Y年m月分'),
			'transactionable' => $payment->transactionable,
			'tickets' => $transactions->where('type', 'ticket'),
			'subscription_total' => $transactions->where('type', 'subscription')->sum('amount'),
			'ticket_total' => $transactions->where('type', 'ticket')->where('deleted_at', null)->sum('amount'),
			'total' => $transactions->sum('amount'),
			'is_approved' => $is_approved
		];

		return view('employee.payments.show', compact('payment'));
	}
}