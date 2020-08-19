<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanciaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instancia_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ano');
            $table->integer('semestre');
            $table->bigInteger('refcurso')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('refcurso')->references('id')->on('cursos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instancia_cursos');
    }
}
