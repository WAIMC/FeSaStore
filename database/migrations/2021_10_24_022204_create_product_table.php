<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('short_description');
            $table->mediumText('description');
            $table->string('image');
            $table->tinyInteger('status')->default(0);
            $table->string('variant');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('brand_id')->references('id')->on('brand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
