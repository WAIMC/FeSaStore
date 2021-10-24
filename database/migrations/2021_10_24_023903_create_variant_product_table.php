<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('variant_attribute');
            $table->float('quantity',9,3);
            $table->float('price',9,3);
            $table->float('discount',9,3);
            $table->text('gallery');
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('product_id');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variant_product');
    }
}
