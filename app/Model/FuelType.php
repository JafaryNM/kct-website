<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'fuelType',
    ];
}
