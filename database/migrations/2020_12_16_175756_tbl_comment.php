<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comment', function (Blueprint $table) {
            $table->Increments('CommentID');
            $table->integer('CustomerID');
            $table->integer('ProductID');
            $table->string('CommentName');
            $table->string('CommentEmail');
            $table->integer('Rating');
            $table->text('CommentDetail');
            $table->date('CommentDate');
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
        Schema::dropIfExists('tbl_comment');
    }
}
