<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'image',
        'productId',
    ];

    public function products(){
        return $this->belongsTo('App\Model\Product','productId');
    }
}
