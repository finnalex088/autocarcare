<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_model', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('code');
           $table->integer('make_id')->unsigned()->index();
           $table->timestamps();
           $table->foreign('make_id')->references('id')->on('car_make');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_model');
    }
};
