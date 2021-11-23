<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListasUsuarioTable3 extends Migration
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

            $table->BigInteger('user_id')->unsigned();

            $table->BigInteger('lista_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('listas_usuario_table3');
    }
}
