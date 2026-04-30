<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->Increments('ShippingID');
            $table->string('ShippingName');
            $table->string('ShippingEmail');
            $table->string('ShippingPhone');
            $table->string('ShippingProvince');
            $table->string('ShippingAddress');
            $table->integer('PaymentMethod');
            $table->integer('PaymentStatus');
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
        Schema::dropIfExists('tbl_shipping');
    }
}
