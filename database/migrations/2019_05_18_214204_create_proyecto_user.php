<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();          
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_user');
    }
}
