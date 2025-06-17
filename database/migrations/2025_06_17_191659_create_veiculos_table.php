<?php

// Migration dos Veiculos

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Função executada quando se roda a migration 
    {
        Schema::create('veiculos', function (Blueprint $table) { //Criando a tabela 'veiculos' no banco
            $table->increments('id'); //Criando as colunas da tabela
            $table->string('placa')->unique();
            $table->string('renavam')->unique();
            $table->string('modelo');
            $table->string('marca');
            $table->integer('ano');
            $table->unsignedBigInteger('proprietario_id'); //Cria um bigint que não pode ser negativo
            $table->softDeletes(); //soft delet
            $table->timestamps(); // Registros de tempo
            $table->foreign('proprietario_id')->references('id')->on('users')->onDelete('cascade'); //criando a FK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
