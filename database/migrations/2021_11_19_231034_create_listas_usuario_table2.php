<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListasUsuarioTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas_usuario', function (Blueprint $table) {
            Schema::dropIfExists('listas_usuario');

            $table->BigInteger('id_usuario')->unsigned();

            $table->BigInteger('id_tabela')->unsigned();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('id_tabela')->references('id')->on('listas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas_usuario');
    }
}
