<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('razonsocial');
            $table->bigInteger('refadmin')->unsigned();
            $table->foreign('refadmin')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institucions');
    }
}
