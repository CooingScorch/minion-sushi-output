<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'user_id',
        'overall_rating',
        'food_taste',
        'food_freshness',
        'order_accuracy',
        'service_speed',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}