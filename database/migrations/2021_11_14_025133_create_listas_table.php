<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas', function (Blueprint $table) {
            $table->id();
            $table->string('lista_nome');
            $table->text('lista_desc');
            $table->boolean('lista_status')->nullable()->default(false);
            $table->UnsignedBigInteger('id_usuario');
            $table->timestamps();

        });

        Schema::table('listas', function (Blueprint $table) {


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
        Schema::dropIfExists('listas');
    }
}
