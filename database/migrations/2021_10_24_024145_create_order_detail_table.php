<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('quantity',9,3);
            $table->float('price',9,3);
            $table->unsignedInteger('variant_product_id');
            $table->unsignedInteger('order_id');
            $table->timestamps();
            $table->foreign('variant_product_id')->references('id')->on('variant_product');
            $table->foreign('order_id')->references('id')->on('order');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
