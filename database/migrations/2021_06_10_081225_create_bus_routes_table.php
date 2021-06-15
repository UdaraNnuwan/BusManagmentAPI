<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('id')->on('buses')->ondelete('cascade');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes')->ondelete('cascade');
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
        Schema::dropIfExists('bus_routes');
    }
}
