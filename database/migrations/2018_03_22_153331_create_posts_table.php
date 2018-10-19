<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned()->default(0);
            $table->string('photo_id')->unsigned()->default(0);
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->text('text');
            $table->integer('likes');
            $table->unsignedInteger('visits')->default(0);

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
        Schema::drop('posts');
    }
}
