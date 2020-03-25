<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->string('nome');
            $table->unsignedBigInteger('pais');
            $table->unsignedBigInteger('estado');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->foreign('pais')->references('id')->on('paises');
            $table->foreign('estado')->references('id')->on('estados'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidades');
    }
}
