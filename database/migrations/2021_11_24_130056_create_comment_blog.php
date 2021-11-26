<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_blog', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->text('comment');
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('customer_id');
            $table->timestamps();
            $table->foreign('blog_id')->references('id')->on('blog');
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
        Schema::dropIfExists('comment_blog');
    }
}
