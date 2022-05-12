<?php

namespace App\Models;

use App\Models\Tailor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Map extends Model
{
    use HasFactory;
    protected $fillable= [
        'tailor_id',
        'address',
        'latitude',
        'longitude'
    ];

    public function tailors()
    {
        return $this->belongsTo(Tailor::class,'tailor_id','tailor_id');
    }

}
