<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'firstName',
        'lastName',
        'phoneNumber',
        'email',
        'country',
        'orderType',
        'status',
        'city',
        'address',
        'gender',
        'enquiry',
        'productImage',
        'productName',
        'category',
        'year',
        'sellingPrice',
        'customerId',
        'paySlip',
        'engineNo',
        'milles',
        'color',
        'firstInstallment',
        'secondInstallment'
    ];
}
