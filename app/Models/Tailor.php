<?php

namespace App\Models;

use App\Models\Map;
use App\Models\Gallery;
use App\Models\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tailor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $primaryKey='tailor_id';

    protected $fillable = [

        'tailor_name',
        'email',
        'region',
        'avator',
        'password',
        'phone',
        'city',
        'address'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gallery()
    {
        return $this->hasMany(Gallery::class,'tailor_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'tailor_id');
    }


    public function maps()
    {
        return $this->hasMany(Map::class,'tailor_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'tailor_id');
    }
}
