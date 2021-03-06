<?php

namespace App\Models;
use App\Models\Cart;
use App\Models\Gender;
use App\Models\Tailor;
use App\Models\Cloth_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable= [
        'name',
        'slug',
        'tailor_id',
        'category_id',
        'gender_id',
        'qty',
        'original_price',
        'selling_price',
        'status',
        'trending',
        'upper_part',
        'lower_part',
        'description',
        'image',
    ];

    public function tailors()
    {
        return $this->belongsTo(Tailor::class,'tailor_id','tailor_id');
    }

    public function categories()
    {
        return $this->belongsTo(Cloth_category::class,'category_id');
    }

    public function genders()
    {
        return $this->belongsTo(Gender::class,'gender_id');

    }

    public function carts()
    {
        return $this->hasMany(Cart::class,'prod_id');
    }




}
