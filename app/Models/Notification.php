<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $dates = [
        'created_at',
        'published_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'genre_id',
        'seen',
        'published_at',
        'group_id',
        'target_id',
        'notifiable_id',
        'notifiable_type',
        'about_type',
        'about_id'
    ];

    static protected $genres = [
        'g1' => 'Kredo Blog',
        'g2' => 'IT',
        'g3' => 'ESL',
        'g4' => 'Housekeeper',
        'g5' => 'Etc'
    ];

    static protected $targets = [
        'companies' => '企業',
        'students' => '生徒',
        'all' => 'すべて',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->genre_id) {
                $model->genre_id = 'g5';
            };
            
            if (!$model->published_at) {
                $model->published_at = now();
            };
        });
    }

    public function notifiable()
    {
        return $this->morphTo();
    }

    // Attributes
    public function getGenreAttribute()
    {
        return self::getGenres($this->genre_id);
    }

    public function getTargetAttribute()
    {
        return self::getTargets($this->target_id);
    }

    // Options
    static function getGenres($index = null)
    {
        $genres = self::$genres;

        if ($index) {
            return $genres[$index] ?? null;
        }

        return collect($genres);
    }

    static function getTargets($index = null)
    {
        $targets = self::$targets;

        if ($index) {
            return $targets[$index] ?? null;
        }

        return collect($targets);
    }
}
