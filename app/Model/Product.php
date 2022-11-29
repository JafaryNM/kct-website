<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productName',
        'productModel',
        'productDoors',
        'productChases',
        'productMiles',
        'productFrontImage',
        'fuelId',
        'transmitionId',
        'seat',
        'engineNo',
        'yearId',
        'selingPrice',
        'productTypeId',
        'colorId',
        'conditionId',
        'categoryId',
        'steeringId',
    ];

    public function transmitions(){
        return $this->belongsTo('App\Model\Transmition','transmitionId');
    }

    public function fuels(){
        return $this->belongsTo('App\Model\FuelType','fuelId');
    }

    public function years(){
        return $this->belongsTo('App\Model\Year','yearId');
    }

    public function types(){
        return $this->belongsTo('App\Model\ProductType', 'productTypeId');
    }

    public function colors(){
        return $this->belongsTo('App\Model\Color','colorId');
    }

    public function conditions(){
        return $this->belongsTo('App\Model\Condition', 'conditionId');
    }

    public function categories(){
        return $this->belongsTo('App\Model\Category', 'categoryId');
    }

    public function steerings(){
        return $this->belongsTo('App\Model\Steering', 'steeringId');
    }
    
}
