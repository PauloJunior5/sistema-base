<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasReceber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas_receber', function (Blueprint $table) {
            $table->tinyIncrements('id');

            $table->tinyInteger('parcela');

            $table->double('valor', 8, 2);
            $table->double('multa', 8, 2);
            $table->double('juro', 8, 2);
            $table->double('desconto', 8, 2);
            
            $table->unsignedTinyInteger('id_contrato');
            $table->unsignedTinyInteger('id_cliente');
            $table->unsignedTinyInteger('id_forma_pagamento');

            $table->timestamp('data_emissao');
            $table->timestamp('data_vencimento');

            $table->timestamps();

            $table->foreign('id_contrato')->references('id')->on('contratos');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_forma_pagamento')->references('id')->on('forma_pagamentos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas_receber');
    }
}
