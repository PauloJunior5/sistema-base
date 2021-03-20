<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicaoPagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicao_pagamentos', function (Blueprint $table) {
            $table->tinyIncrements('id_condicao_pagamento');

            $table->string('condicao_pagamento');
            $table->double('multa', 8, 2);
            $table->double('juro', 8, 2);
            $table->double('desconto', 8, 2);

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
        Schema::dropIfExists('condicao_pagamentos');
    }
}