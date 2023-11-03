<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('person_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_personId');
            $table->foreign('fk_personId')->references('id')->on('people')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_userId');
            $table->foreign('fk_userId')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->longText('body');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('person_comments');
    }
}
