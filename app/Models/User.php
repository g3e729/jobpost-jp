<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'japanese_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Encrypt the password when set.
     *
     * @param mixed $value
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    
    /**
     * Get user roles.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    
    /**
     * Get user profile.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasOne
     */
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

    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     *
     * @return bool
     */
    public function hasRole(string $slug)
    {
        return (bool) $this->roles()->whereSlug($slug)->count();
    }
}
