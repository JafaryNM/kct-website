<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'categoryName',
        'productId',
    ];

    public function products(){
        return $this->belongsTo('App\Model\Product');
    }
}
