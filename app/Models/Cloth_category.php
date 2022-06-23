<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth_category extends Model
{

    use HasFactory;
    protected $primaryKey='category_id';
    protected $table='cloth_categories';
    protected $fillable= [
        'category_id',
        'category_name',

    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }


}
