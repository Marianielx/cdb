<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 255);
            $table->string('nickname', 100);
            $table->string('phoneOne', 20);
            $table->string('phoneTwo', 20);
            $table->string('watchStation', 255);
            $table->string('watchPhone', 20);
            $table->string('neighborhood', 255);
            $table->string('missingdate');
            $table->string('mental_diase', 10);
            $table->string('mute_and_deaf', 10);
            $table->string('can_not_see', 10);
            $table->longText('message');
            $table->string('image', 255);
            $table->unsignedBigInteger('fk_userId');
            $table->foreign('fk_userId')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string('state', 25);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}