<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomBannersTable extends Migration
{
    public function up()
    {
        Schema::create('customer_banners', function (Blueprint $table) {
            $table->id();
            $table->string('path', 255);
            $table->string('link', 255);
            $table->string('title', 255);
            $table->string('alt', 255);
            $table->unsignedBigInteger('fk_userId');
            $table->foreign('fk_customId')->references('id')->on('customers')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_customId');
            $table->foreign('fk_userId')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_banners');
    }
}
