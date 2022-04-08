<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable= [
        'fname',
        'lname',
        'phone',
        'email',
        'status',
        'message',
        'tracking_no'

    ];

}
