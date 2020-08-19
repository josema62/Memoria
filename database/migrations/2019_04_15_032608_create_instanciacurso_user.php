<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanciacursoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instanciacurso_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();          
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('instancia_curso_id')->unsigned();
            $table->foreign('instancia_curso_id')->references('id')->on('instancia_cursos')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instanciacurso_user');
    }
}
