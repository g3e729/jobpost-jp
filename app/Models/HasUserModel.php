<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasUserModel extends Model
{
    public static function boot()
    {
        parent::boot();
        static::retrieved(function ($model) {
            $model->display_name = empty(str_replace(' ', '', $model->user->japanese_name)) ? $model->user->name : $model->japanese_name;
            $model->email = $model->user->email;
            $model->japanese_name = $model->user->japanese_name;
            $model->name = $model->user->name;
        });
    }
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
