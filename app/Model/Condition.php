<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'conditionName',
    ];
}
