<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    //
    protected $table = 'order_log';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'table_number',
        'bill_amount',
        'created_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
