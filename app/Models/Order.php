<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable= [
        'fname',
        'user_id',
        'lname',
        'phone',
        'email',
        'status',
        'total_price',
        'message',
        'tracking_no'

    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
