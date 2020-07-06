<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('tipo')->nullable();
            $table->string('cliente')->nullable();
            $table->string('apelido')->nullable();
            $table->string('estado_civil')->nullable();

            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('id_cidade');

            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->integer('sexo')->nullable();
            $table->string('nacionalidade')->nullable();

            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('emissor')->nullable();
            $table->string('uf')->nullable();
            $table->date('nascimento')->nullable();

            $table->string('observacao')->nullable();
            $table->float('limite_credito')->nullable();
            $table->integer('condicao_pagamento');

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
        Schema::dropIfExists('laboratorios');
    }
}
