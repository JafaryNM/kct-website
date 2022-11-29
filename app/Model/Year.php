<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'year'
    ];
}
