<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->tinyIncrements('id_estado');
            $table->string('uf');
            $table->string('estado');
            $table->unsignedTinyInteger('id_pais');
            $table->timestamps();
            $table->foreign('id_pais')->references('id_pais')->on('paises'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}