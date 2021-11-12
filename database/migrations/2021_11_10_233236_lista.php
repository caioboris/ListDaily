<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_LISTA', function (Blueprint $table) {
            $table->id();
            $table->string('lista_nome');
            $table->boolean('lista_status')->nullable()->default(false);
            $table->UnsignedBigInteger('id_usuario');
            $table->timestamps();
        });

        Schema::table('TB_LISTA', function (Blueprint $table) {


            $table->foreign('id_usuario')->references('id')->on('user')->onDelete('cascade');
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
