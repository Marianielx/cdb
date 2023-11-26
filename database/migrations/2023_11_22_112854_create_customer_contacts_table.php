<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerContactsTable extends Migration
{
    public function up()
    {
        Schema::create('customer_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('custom_charge', 255);
            $table->string('custom_email', 255);
            $table->string('custom_facebook', 255);
            $table->string('custom_gmail', 255);
            $table->string('custom_phone', 20);
            $table->string('custom_instagram', 255);
            $table->string('custom_linkedin', 255);
            $table->unsignedBigInteger('fk_userId');
            $table->foreign('fk_customId')->references('id')->on('customers')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_customId');
            $table->foreign('fk_userId')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->string('custom_state', 25);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_contacts');
    }
}
