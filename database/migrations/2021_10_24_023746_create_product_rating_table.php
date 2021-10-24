<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rating', function (Blueprint $table) {
            $table->increments('id');
            $table->float('star_rating',2,1);
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
        Schema::dropIfExists('product_rating');
    }
}
