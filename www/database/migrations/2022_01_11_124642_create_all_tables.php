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

        Schema::create('estados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('cidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estados');
        });

        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('complemento');
            $table->integer('numero');
            $table->unsignedBigInteger('cidade_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });

        Schema::create('permissoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->text('descricao');
            $table->timestamps();
        });

        Schema::create('perfis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('permissao_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perfis', function (Blueprint $table){
            $table->dropForeign('perfis_permissao_id_foreign');
            $table->dropForeign('perfis_user_id_foreign');
        });

        Schema::dropIfExists('perfis');
        Schema::dropIfExists('permissoes');

        Schema::table('enderecos', function (Blueprint $table){
            $table->dropForeign('enderecos_cidade_id_foreign');
            $table->dropForeign('enderecos_cliente_id_foreign');
        });
        Schema::dropIfExists('enderecos');

        Schema::table('cidades', function (Blueprint $table){
            $table->dropForeign('cidades_estado_id_foreign');
        });
        Schema::dropIfExists('cidades');
        Schema::dropIfExists('estados');
    }
}
