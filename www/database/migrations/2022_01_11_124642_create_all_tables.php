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

        // Schema::create('permissoes', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nome');
        //     $table->text('descricao');
        //     $table->timestamps();
        // });

        // Schema::create('perfis', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nome');
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('permissao_id');
        //     $table->timestamps();

        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('perfis', function (Blueprint $table){
        //     $table->dropForeign('perfis_permissao_id_foreign');
        //     $table->dropForeign('perfis_user_id_foreign');
        // });

        // Schema::dropIfExists('perfis');
        // Schema::dropIfExists('permissoes');

        Schema::table('enderecos', function (Blueprint $table){
            $table->dropForeign('enderecos_cliente_id_foreign');
        });
        Schema::dropIfExists('enderecos');
    }
}
