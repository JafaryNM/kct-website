<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaySlip extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'paySlip',
        'orderId',
    ];
}
