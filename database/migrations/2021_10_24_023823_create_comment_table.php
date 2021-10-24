<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->text('comment');
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('customer_id');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
