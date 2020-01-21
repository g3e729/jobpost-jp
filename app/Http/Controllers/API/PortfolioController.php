<?php

namespace App\Http\Controllers\API;

use App\Models\Portfolio;
use App\Services\PortfolioService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PortfolioController extends BaseController
{
	public function store(Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		return (new PortfolioService)->insert($profile, $request->only('title', 'description', 'url'));
	}

	public function update(Portfolio $portfolio, Request $request)
	{
		$profile = auth()->user()->profile ?? null;

		if (!$profile) {
			return apiAbort(404);
		}

		return (new PortfolioService)->revise($portfolio->id, $request->only('title', 'description', 'url'));
	}
}