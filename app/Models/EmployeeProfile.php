<?php

namespace App\Models;

use App\Models\HasUserModel;

class EmployeeProfile extends HasUserModel
{
	const ROLE = 'employee';

    protected $dates = [
        'birthday',
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
        'japanese_name',
        'sex',
        'contact_number',
        'prefecture',
        'address1',
        'address2',
        'address3',
        'country',
        'status',
        'passport_number',
        'avatar',
        'position_id',
        'birthday',
    ];

    static protected $employment_status = [
        1 => '無休インターン : Unpaid intern',
        2 => '有給インターン : Paid intern',
        3 => '契約社員 : Contract employee',
        4 => '社員 : Employee',
        5 => 'パートタイム : Part time',
        6 => 'フルタイム : Full time',
        7 => '退職 : Retirement',
    ];

    static protected $positions = [
        1 => 'IT',
        2 => 'ESL',
        3 => 'Housekeeper',
        4 => 'Admin',
        5 => 'Marketing',
        6 => 'Sales',
        7 => 'Student Support',
    ];

    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            foreach(['email', 'name', 'japanese_name', 'display_name'] as $attribute) {
                unset($model->$attribute);
            }
        });
    }

    public function scopeSearch($query, $value)
    {
        return $query->whereHas('user', function ($q) use ($value) {
            $q->where('japanese_name', 'LIKE', "%{$value}%")->orWhere('name', 'LIKE', "%{$value}%");
        });
    }

    public function getPositionAttribute()
    {
        return ucwords(self::$positions[$this->position_id]);
    }

    public function getEmploymentStatusAttribute()
    {
        return ucwords(self::$employment_status[$this->status]);
    }

    static function getEmploymentStatus($index = null)
    {
        $employment_status = self::$employment_status;

        if ($index) {
            return $employment_status[$index] ?? null;
        }

        return collect($employment_status);
    }

    static function getPositions($index = null)
    {
        $positions = self::$positions;

        if ($index) {
            return $positions[$index] ?? null;
        }

        return collect($positions);
    }
}
