<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement_detail extends Model
{
    use HasFactory;
    protected $table='measurement_details';
    protected $fillable= [
        'id',
        'tailor_id',
        'name',
        'phone',
        'details'
    ];

}
