<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriateTableCandidatoHasVagas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato_has_vagas', function (Blueprint $table) {
            $table->integer('id_candidatos')->references('id')->on('candidatos');
            $table->integer('id_vagas')->references('id')->on('vagas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidato_has_vagas');
    }
}
