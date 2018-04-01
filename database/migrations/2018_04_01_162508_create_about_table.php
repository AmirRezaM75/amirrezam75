<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('birthday');
            $table->string('job');
            $table->string('email');
            $table->string('address');
            $table->string('text');
            $table->timestamps();
        });
        \App\About::create(['name'=>'Amir','email'=>'amirrezax@hotmail.com','address'=>'Tehran','birthday'=>'1996','job'=>'web designer','text'=>'about me']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('about');
    }
}
