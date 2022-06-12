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

        'user_id',
        'tailor_id',
        'email',
        'price',
        'status',

        'description',
        'tracking_no'

    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }
}
