<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'japanese_name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    
    public function profile()
    {
        if ($this->hasRole('seeker')) {
            return $this->hasOne(SeekerProfile::class);
        }

        if ($this->hasRole('employee')) {
            return $this->hasOne(EmployeeProfile::class);
        }

        return $this->hasOne(CompanyProfile::class);
    }

    public function hasRole(string $slug)
    {
        return (bool) $this->roles()->whereSlug($slug)->count();
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
