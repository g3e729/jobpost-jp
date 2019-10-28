<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasUserModel extends Model
{

    public function getEmailAttribute()
	{
		return $this->user->email;
	}

    public function getNameAttribute()
	{
		return $this->user->name;
	}
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
