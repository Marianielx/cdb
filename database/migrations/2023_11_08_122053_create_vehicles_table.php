<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_ownername', 255);
            $table->string('vehicle_ownertelephone', 20);
            $table->string('vehicle_owneraddress', 255);
            $table->string('vehicle_type', 10);
            $table->string('vehicle_model', 50);
            $table->string('vehicle_brand', 50);
            $table->string('vehicle_engine_number', 50);
            $table->string('vehicle_chasis_number', 50);
            $table->string('vehicle_board_number', 50);
            $table->string('vehicle_card_number', 20);
            $table->string('vehicle_color', 20);
            $table->string('vehicle_missingdate');
            $table->longText('vehicle_message');
            $table->string('vehicle_image', 255);
            $table->unsignedBigInteger('fk_userId');
            $table->foreign('fk_userId')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string('vehicle_state', 25);
            $table->string('vehicle_focus', 255);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
