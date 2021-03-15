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
            $table->tinyIncrements('id');

            $table->integer('parcela');
            $table->integer('dias');
            $table->float('porcentual');
            $table->unsignedTinyInteger('forma_pagamento')->nullable(); // foreign_key formas de pagamento
            
            $table->timestamps();

            $table->foreign('forma_pagamento')->references('id')->on('forma_pagamentos'); 
        });
    }

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
