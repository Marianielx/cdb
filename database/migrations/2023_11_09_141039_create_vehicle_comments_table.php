<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_vehicleId');
            $table->foreign('fk_vehicleId')->references('id')->on('vehicles')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_userId');
            $table->foreign('fk_userId')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->longText('body');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vehicle_comments');
    }
}
