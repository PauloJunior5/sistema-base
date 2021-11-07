<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('plano');
            $table->double('valor', 8, 2);
            $table->unsignedTinyInteger('id_condicao_pagamento');

            $table->timestamps();

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
        Schema::dropIfExists('planos');
    }
}
