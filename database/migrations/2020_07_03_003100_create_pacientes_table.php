<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('paciente');
            $table->string('apelido');
            $table->unsignedBigInteger('id_medico'); // foreign_key medicos
            $table->string('endereco');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cep');
            $table->unsignedBigInteger('id_cidade'); // foreign_key cidades
            $table->integer('sexo');
            $table->string('nascimento');
            $table->string('estado_civil');
            $table->string('nacionalidade');
            $table->string('cpf');
            $table->string('rg');
            $table->string('emissor');
            $table->string('uf');
            $table->string('observacao');

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
        Schema::dropIfExists('pacientes');
    }
}
