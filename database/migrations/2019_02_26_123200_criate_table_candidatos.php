<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriateTableCandidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
           $table->timeTz('data_nascimento')->nullable();
            $table->string('cpf',12)->nullable();;
            $table->string('instituicao',200)->nullable();;
            $table->string('graduacao',100)->nullable();;
            $table->integer('ano_conclusao')->nullable();;
            $table->string('senha');
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
        Schema::dropIfExists('candidatos');
            //
        
    }
}
