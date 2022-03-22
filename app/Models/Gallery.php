<?php

namespace App\Models;

use App\Models\Tailor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    
    
    protected $table='galleries';
    protected $fillable= [
        'id',
        'tailor_id',
        'image',
    ];

    public function tailor()
    {
        return $this->belongsTo(Tailor::class);
    }
}
