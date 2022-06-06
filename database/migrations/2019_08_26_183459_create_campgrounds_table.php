<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campgrounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('owner_id');
            $table->string('picture');
            $table->unsignedInteger('price');
            $table->text('description')->nullable();
            $table->timestamps();


            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campgrounds');
    }
}
