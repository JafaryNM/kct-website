<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Steering extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'steeringType',
    ];
}
