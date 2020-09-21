<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
protected $fillable = [
    'order_id',
    'item_id',
    'item_price',
    'item_quantity',
    'item_total',
    'order_item_status'
   ];
}
