<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->primary(['id_condicao_pagamento', 'parcela']);
            $table->integer('parcela');
            $table->integer('dias');
            $table->float('porcentual');
            $table->unsignedTinyInteger('id_forma_pagamento')->nullable();

            $table->timestamps();

            $table->foreign('id_forma_pagamento')->references('id')->on('forma_pagamentos');
            $table->foreign('id_condicao_pagamento')->references('id')->on('condicao_pagamentos');
        });
    }

    /**
     * 
     * Relacionamentos com parcelas
     *
     * parcela n-----1 forma de pagamento
     * parcela n-----1 condicao pagamento
     * 
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelas');
    }
}
