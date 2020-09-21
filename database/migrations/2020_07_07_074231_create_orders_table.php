<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->date('delivery_date');
            $table->string('delivery_time');
            $table->double('total_amount');
            $table->double('discounts');
            $table->double('delivery_charge');
            $table->double('packaging charge');
            $table->string('billing_address');
            $table->string('delivery_address');
            $table->string('order_platform');
            $table->integer('order_status');
         
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
        Schema::dropIfExists('orders');
    }
}
