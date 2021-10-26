<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListaDeProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('lista_nome');
            $table->integer('lista_count');
            $table->unsignedBigInteger('id_usuario');
        });

        Schema::table('lista', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
