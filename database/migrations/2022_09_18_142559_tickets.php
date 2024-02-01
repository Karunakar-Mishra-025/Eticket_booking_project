<?php

use GuzzleHttp\Promise\Create;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('train_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('pnr');
            $table->bigInteger('amount');
            $table->string('date');
            $table->string('transaction_id');
            $table->string('Passenger_name');
            $table->integer('Passenger_age');
            $table->string('Passenger_email');
            $table->bigInteger('Passenger_aadhar');       
            $table->string('seat');
            $table->string('status');
            $table->string('train_name');
            $table->string('from');
            $table->string('to');
            $table->string('deparcher');
            $table->string('arrival');
            $table->string('total_journey_time');
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
        Schema::dropIfExists('tickets');
    }
};
