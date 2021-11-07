<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('contrato');
            $table->double('valor', 8, 2);
            $table->unsignedTinyInteger('id_responsavel');
            $table->unsignedTinyInteger('id_cliente');
            $table->timestamps();
            $table->timestamp('vigencia');
            $table->foreign('id_responsavel')->references('id')->on('clientes');
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
