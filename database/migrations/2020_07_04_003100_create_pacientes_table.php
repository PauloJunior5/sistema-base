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
            $table->tinyIncrements('id');

            $table->string('paciente')->nullable();
            $table->string('apelido')->nullable();
            $table->unsignedTinyInteger('id_medico'); // foreign_key medicos
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->unsignedTinyInteger('id_cidade'); // foreign_key cidades
            $table->integer('sexo')->nullable();
            $table->string('nascimento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('observacao')->nullable();

            $table->timestamps();

            $table->foreign('id_medico')->references('id')->on('medicos');
            $table->foreign('id_cidade')->references('id')->on('cidades');
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
