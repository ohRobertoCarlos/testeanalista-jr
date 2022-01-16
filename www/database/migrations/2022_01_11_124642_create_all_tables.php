<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cep');
            $table->string('logradouro')->nullable();
            $table->string('bairro')->nullable();
            $table->string('complemento')->nullable();
            $table->integer('numero')->nullable();
            $table->string('cidade');
            $table->boolean('principal')->default(false);
            $table->string('estado');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enderecos', function (Blueprint $table){
            $table->dropForeign('enderecos_cliente_id_foreign');
        });
        Schema::dropIfExists('enderecos');
    }
}
