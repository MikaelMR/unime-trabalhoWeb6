<?php

/*
* União Metropolitana de Educação e Cultura
* Bacharelado em Sistemas de Informação
* Programação Orientada a Objetos II
* Prof. Pablo Ricardo Roxo Silva
* Mikael Magalhães Ramos
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAventureirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aventureiros', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 40);
            $table->string('raca', 20);
            $table->integer('idade');
            $table->string('classe', 20);
            $table->integer('nivel');
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
        Schema::dropIfExists('aventureiros');
    }
}
