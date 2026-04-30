<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_detail', function (Blueprint $table) {
            $table->Increments('BillDetaiID');
            $table->integer('OrderID');
            $table->integer('ProductID');
            $table->string('ProductName');
            $table->float('ProductPrice');
            $table->integer('ProductQuanty');
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
        Schema::dropIfExists('tbl_bill_detail');
    }
}
