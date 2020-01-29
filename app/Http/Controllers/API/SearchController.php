<?php

namespace App\Http\Controllers\API;

use App\Services\SearchService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function search(Request $request)
    {
        return (new SearchService($request->get('search'), $request->get('paginated', true)))->search('jobs', 'companies');
    }
}
