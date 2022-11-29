<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'colorType',
    ];
}
