<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListasProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas_produto', function (Blueprint $table) {

            $table->BigInteger('produto_id')->unsigned();

            $table->BigInteger('lista_id')->unsigned();

            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');

            $table->foreign('lista_id')->references('id')->on('listas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas_produto');
    }
}
