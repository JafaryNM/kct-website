<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transmition extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'transmitionName',
    ];
}
