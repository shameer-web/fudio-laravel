<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //


     protected $fillable = [




           'item_name',
           'item_image',
           'description',
           'item_price',
           'offer_price',
           'diet',
           'category_id',
           'menu_id',
           'vendor_id',
           'preparation_time',
           'item_status',









     ];
}
