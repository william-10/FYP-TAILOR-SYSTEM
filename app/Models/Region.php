<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;
    protected $table='region';
    protected $fillable= [
        'name',
        'RegionCode'
            ];

            public function cities()
    {
        return $this->hasMany(City::class,'Regions');
    }

}
