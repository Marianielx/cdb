<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersBannersPlansTable extends Migration
{
    public function up()
    {
        Schema::create('customers_banners_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('deadline', 3);
            $table->string('description', 255);
            $table->string('state', 255);
            $table->unsignedBigInteger('fk_userId');
            $table->foreign('fk_userId')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers_banners_plans');
    }
}
