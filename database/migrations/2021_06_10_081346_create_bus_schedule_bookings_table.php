<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusScheduleBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedule_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_seat_id');
            $table->foreign('bus_seat_id','seat_number')->references('id','seat_number')->on('bus_seats')->ondelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');           
            $table->unsignedBigInteger('bus_schedule_id');
            $table->foreign('bus_schedule_id')->references('id')->on('bus_schedules')->ondelete('cascade');
            $table->unsignedBigInteger('seat_number');
            $table->string('price');
            $table->string('status');
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
        Schema::dropIfExists('bus_schedule_bookings');
    }
}
