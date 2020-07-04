<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('medico');
            $table->string('crm');
            $table->string('especialidade');
            $table->string('endereco');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cep');
            $table->unsignedBigInteger('id_cidade'); // foreign_key cidades
            $table->string('nascimento');
            $table->string('nacionalidade');
            $table->string('telefone');
            $table->string('celular');
            $table->string('email');
            $table->string('cpf');
            $table->string('rg');
            $table->string('observacao');

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
        Schema::dropIfExists('medicos');
    }
}
