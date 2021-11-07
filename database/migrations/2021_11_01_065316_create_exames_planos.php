<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamesPlanos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames_planos', function (Blueprint $table) {
            $table->primary(['id_exame', 'id_plano']);

            $table->unsignedTinyInteger('id_exame');
            $table->unsignedTinyInteger('id_plano');

            $table->timestamps();

            $table->foreign('id_exame')->references('id')->on('exames');
            $table->foreign('id_plano')->references('id')->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exames_planos');
    }
}
