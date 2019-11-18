<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Transaction;

class TicketController extends BaseController
{
	public function index()
	{
		$approved = Transaction::where('is_approved', 1)->get();
		$not_approved = Transaction::where('is_approved', 0)->get();

		return view('employee.tickets.index', compact('approved', 'not_approved'));
	}
}
