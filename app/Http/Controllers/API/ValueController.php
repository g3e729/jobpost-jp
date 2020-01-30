<?php

namespace App\Http\Controllers\API;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ValueController extends BaseController
{
    public function index()
    {
        $experiences = experiences();
        $skill_rates = skillRate();

        return compact('experiences', 'skill_rates');
    }
}
