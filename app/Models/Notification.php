<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [

        'tailor_id',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function tailors()
    {
        return $this->belongsTo(Tailor::class,'tailor_id');

    }
}
