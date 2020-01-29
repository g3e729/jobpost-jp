<?php

namespace App\Models;

use App\Mail\ForgotPassword;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $primaryKey = 'email';
    public $incrementing = false;
    public $timestamps = false;

    protected $dates = [
        'requested_at'
    ];

    protected $fillable = [
        'email',
        'token',
        'requested_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            self::whereEmail($model->email)->delete();
            $model->token = md5(uniqid($model->email . now(), true));
            $model->requested_at = $model->freshTimestamp();
        });
        static::created(function ($model) {
            $url = route('password.reset', ['token' => $model->token]);

            \Mail::to($model->email)->send(new ForgotPassword($url));
        });
    }

    public function scopeFindToken($query, $token)
    {
        return $query->whereToken($token)->first();
    }
}
