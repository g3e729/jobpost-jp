<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasUserModel extends Model
{
    public static function boot()
    {
        parent::boot();
        static::retrieved(function ($model) {
            $model->email = $model->user->email;
            $model->name = $model->user->name;
            $model->display_name = empty(str_replace(' ', '', $model->japanese_name)) ? $model->user->name : $model->japanese_name;
        });
    }
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
