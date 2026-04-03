<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    
    public $timestamps = false; 

    protected $fillable = [
        'order_log_id', 
        'item_name', 
        'price', 
        'qty'
    ];

    public function orderLog()
    {
        return $this->belongsTo(OrderLog::class, 'order_log_id');
    }
}