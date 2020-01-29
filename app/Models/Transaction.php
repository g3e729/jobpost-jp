<?php

namespace App\Models;

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
            $user = auth()->user();

            if (!$user) {
                $user = User::find($model->transactionable->user_id ?? null);
            }

            if ($user) {
                $name = $user->profile->display_name;
                $users = User::whereHas('roles', function ($q) {
                    $q->whereIn('slug', ['admin']);
                })->get();

                $title = "{$name} submitted a payment record for review.";
                $description = '';
                $about_id = $model->id;
                $about_type = Transaction::class;
                $group_id = substr(md5(now()), 0, 8);

                foreach ($users as $user) {
                    $user->notifications()->create(compact('title', 'description', 'about_type', 'about_id', 'group_id'));
                }
            }
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