<?php

namespace App\Models;

use App\Models\HasUserModel;

class EmployeeProfile extends HasUserModel
{
	const ROLE = 'employee';

    public static function boot()
    {
        parent::boot();
    }
}
