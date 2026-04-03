<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Factories\HasFactory;

class menulist extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'price',
        'available',
        'description',
        'image'
    ];
}
