<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
	const ROLE = 'employee';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
