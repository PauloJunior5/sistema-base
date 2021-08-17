<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_pacientes', function (Blueprint $table) {
            $table->primary(['id_contrato', 'id_paciente']);

            $table->unsignedTinyInteger('id_contrato');
            $table->unsignedTinyInteger('id_paciente');

            $table->timestamps();

            $table->foreign('id_contrato')->references('id')->on('contratos');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos_pacientes');
    }
}
