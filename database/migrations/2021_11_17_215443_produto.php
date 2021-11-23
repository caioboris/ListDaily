<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('produto_nome');
            $table->string('produto_obs')->nullable();
            $table->decimal('produto_preco', 5, 2)->nullable()->default(123.45);;
            $table->UnsignedBigInteger('id_lista');
            $table->timestamps();
        });

        Schema::table('produto', function (Blueprint $table) {


            $table->foreign('id_lista')->references('id')->on('listas')->onDelete('cascade');
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
