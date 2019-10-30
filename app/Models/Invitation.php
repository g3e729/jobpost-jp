<?php

namespace App\Models;

use App\Mail\SendInvite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'email',
        'code',
        'type',
    ];

	static protected $types = [
		1 => 'student',
		2 => 'company',
		3 => 'employee'
	];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->code = md5(uniqid($model->email, true));
        });
        static::created(function ($model) {
        	$url = route('register.create', ['code' => $model->code]);

        	\Mail::to($model->email)->send(new SendInvite($url));
        });
    }

	static function getTypes($index = null)
	{
		$invitation_types = self::$types;

		if ($index) {
			return $invitation_types[$index] ?? null;
		}

		return collect($invitation_types);
	}
}
