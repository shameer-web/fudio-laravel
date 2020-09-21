<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //


     protected $fillable = [



        'user_id',
        'email',
        'vendor_name',
        'skills',
        'description',
        'address',
        'pincode',
        'mobile',
        'land_phone',
        'area',
        'country',
        'delivery_charge',
        'packing_charge',
        'distance',

         'minimum_delivery_time',
         'license_certification_number',
         'vendor_image',
         'google_address',
         'latitude',
         'longitude',
         'vendor_status',
         'banner_image',








     ];
}
