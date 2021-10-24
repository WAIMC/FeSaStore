<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('short_description');
            $table->mediumText('description');
            $table->string('image');
            $table->string('author');
            $table->string('slug');
            $table->unsignedInteger('category_blog_id');
            $table->timestamps();
            $table->foreign('category_blog_id')->references('id')->on('category_blog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
