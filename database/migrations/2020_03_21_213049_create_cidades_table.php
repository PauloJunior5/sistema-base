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
            $table->tinyIncrements('id_cidade');
            $table->string('ddd');
            $table->string('cidade');
            $table->unsignedTinyInteger('id_estado');
            $table->timestamps();
            $table->foreign('id_estado')->references('id_estado')->on('estados'); 
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