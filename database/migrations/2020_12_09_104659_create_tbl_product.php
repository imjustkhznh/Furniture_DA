<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('ProductID');
            $table->integer('BrandID');
            $table->integer('CategoryID');
            $table->string('ProductName');
            $table->float('ProductPrice');
            $table->integer('ProductQuanty');
            $table->string('ProductImage1');
            $table->string('ProductImage2');
            $table->string('ProductImage3');
            $table->text('ProductContent');
            $table->text('ProductDescrip');
            $table->integer('ProductChienluoc');
            $table->string('ProductColor');
            $table->integer('ProductStatus');
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
        Schema::dropIfExists('tbl_product');
    }
}
