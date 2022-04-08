<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table='order_items';
    protected $fillable= [
        'order_id',
        'prod_id',
        'qty',
        'tailor_id',
        'price',

        'bega',
        'mkono',
        'kifua',
        'urefu_juu',
        'urefu_mguu',
        'paja',
        'kiuno'

    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }


}
