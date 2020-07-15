<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('tipo')->nullable();
            $table->string('cliente')->nullable();
            $table->string('apelido')->nullable();
            $table->string('nome_fantasia')->nullable();

            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->unsignedBigInteger('id_cidade'); // foreign_key cidades

            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('nacionalidade')->nullable();

            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('emissor')->nullable();
            $table->string('uf')->nullable();
            $table->date('nascimento')->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('cnpj')->nullable();

            $table->string('observacao')->nullable();
            $table->float('limite_credito')->nullable();
            $table->integer('condicao_pagamento')->nullable();

            $table->timestamps();

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
        Schema::dropIfExists('clientes');
    }
}
