<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table='city';
    protected $fillable= [
        'city_name',
        'DistrictsCode',
        'Regions'

    ];

    public function regions()
    {
        return $this->belongsTo(Region::class,'Regions','name');
    }
}
