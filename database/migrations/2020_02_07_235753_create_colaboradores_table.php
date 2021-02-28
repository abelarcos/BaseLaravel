<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *g
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('nombre', 250);
            $table->string('especialidad', 250);
            $table->string('foto', 250)->default('img/profile-picture.png');
            $table->string('twitter', 250)->nullable();
            $table->string('github', 250)->nullable();
            $table->string('linkedin', 250)->nullable();
            $table->string('correo_electronico', 250)->nullable();
            $table->text('descripcion');
            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboradores');
    }
}
