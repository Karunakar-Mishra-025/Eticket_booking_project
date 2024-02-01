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
        Schema::create('trains', function (Blueprint $table) {
            $table->id('id');
            $table->integer('trainno');
            $table->string('name');
            $table->integer('av_seats_no');
            $table->string('available_seats',1000);
            $table->string('from_station');
            $table->string('from');
            $table->string('to');
            $table->string('to_station');
            $table->string('date');
            $table->string('arrival_date');
            $table->string('deparcher');
            $table->string('arrival');
            $table->string('stops',550);
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
        Schema::dropIfExists('trains');
    }
};
