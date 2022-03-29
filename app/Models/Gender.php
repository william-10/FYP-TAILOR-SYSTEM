<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    use HasFactory;
    protected $table='genders';
    protected $fillable= [
        'id',
        'name',
        'image',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }


}
