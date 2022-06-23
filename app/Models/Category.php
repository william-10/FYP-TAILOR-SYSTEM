<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable= [
        'tailor_id',
        'cloth_category_id',

    ];

    public function tailors()
    {
        return $this->belongsTo(Tailors::class,'tailor_id');
    }

    public function sewcategory()
    {
        return $this->belongsTo(Cloth_category::class,'cloth_category_id');
    }
}
