<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('path')->nullable();
            $table->unsignedBigInteger('fk_idvehicle');
            $table->foreign('fk_idvehicle')->references('id')->on('vehicles')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vehicle_galleries');
    }
}
