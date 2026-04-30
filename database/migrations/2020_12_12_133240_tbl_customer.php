<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->Increments('CustomerID');
            $table->string('CustomerFirstName');
            $table->string('CustomerName');
            $table->string('CustomerEmail');
            $table->string('CustomerPhone');
            $table->string('CustomerUsername');
            $table->string('CustomerAddress');
            $table->integer('CustomerProvince');
            $table->string('CustomerPass');
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
        Schema::dropIfExists('tbl_customer');
    }
}
