<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //


     protected $fillable = [

           'user_id',
           'vendor_id',
           'delivery_date',
           'delivery_time',
           'total_amount',
           'discounts',
           'delivery_charge',
           'packaging charge',
           'billing_address',
           'delivery_address',
           'order_platform',
           'customer_note',
           'cancel_note',
           'order_status',

          


       ];
}
