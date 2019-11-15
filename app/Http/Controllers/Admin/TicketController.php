<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Faker\Factory;

class TicketController extends BaseController
{
	public function index()
	{
		$approved = Transaction::where('is_approved', 1)->get();
		$not_approved = Transaction::where('is_approved', 0)->get();

		return view('admin.tickets.index', compact('approved', 'not_approved'));
	}

	public function destroy(Transaction $payment)
	{
		$payment->delete();

		return back()->with('success', "Success! Transaction succesfully deleted!");
	}
}
