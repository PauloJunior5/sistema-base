<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->tinyIncrements('id');

            $table->string('fornecedor')->nullable();
            $table->string('nome_fantasia')->nullable();

            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->unsignedTinyInteger('id_cidade');

            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('contato')->nullable();

            $table->string('inscricao_estadual')->nullable();
            $table->string('cnpj')->nullable();

            $table->string('observacao')->nullable();
            $table->float('limite_credito')->nullable();
            $table->unsignedTinyInteger('id_condicao_pagamento');

            $table->timestamps();

            $table->foreign('id_cidade')->references('id')->on('cidades'); 
            $table->foreign('id_condicao_pagamento')->references('id')->on('condicao_pagamentos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}
