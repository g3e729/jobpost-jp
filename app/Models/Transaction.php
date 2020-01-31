<?php

namespace App\Models;

use App\Services\NotificationService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'amount',
        'type',
        'type_id',
        'tickets',
        'description',
        'is_approved',
        'transactionable_id',
        'transactionable_type'
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            (new NotificationService)->transactionTrigger($model);
        });
    }

    // Scopes
    public function scopeSearch($query, $value)
    {
        return $query->where('description', 'LIKE', "%{$value}%");
    }

    // Relations
    public function transactionable()
    {
        return $this->morphTo();
    }
}