<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'featureName',
        'productId',
    ];

    public function products(){
        return $this->belongsTo('App\Model\Product');
    }
}
