<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TicketController extends BaseController
{
	public function index()
	{
		$approved = Transaction::whereType('ticket')->where('is_approved', 1)->get();
		$not_approved = Transaction::whereType('ticket')->where('is_approved', 0)->get();

		return view('admin.tickets.index', compact('approved', 'not_approved'));
	}

	public function destroy(Transaction $ticket)
	{
		$ticket->delete();

		return back()->with('success', "Success! Ticket succesfully deleted!");
	}
}
