<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();


            $table->string('vendor_name');
            $table->string('skills');
            $table->string('description');
            $table->string('category');
            $table->string('address');
            $table->string('mobile');
            $table->string('land_phone');
            $table->string('area');
            $table->string('country');     
            $table->integer('delivery_charge');
            $table->integer('packing_charge');
            $table->string('distance');
            $table->integer('minimum_delivery_time');
            $table->string('license_certification_number');
           
            $table->string('image');
             $table->string('google_address');
             $table->string('latitude');
             $table->string('longitude');
             $table->integer('vendor_status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
