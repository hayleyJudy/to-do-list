<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_email', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('client_name');
            $table->string('subject');
            $table->string('text');
            $table->timestamps(); //columns in DB: created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('send_email', function (Blueprint $table) {
            Schema::dropIfExists('sendemail');
        });
    }
}
