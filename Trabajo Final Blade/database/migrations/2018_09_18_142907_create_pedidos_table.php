<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
//            $table->integer('persona_id');
//            $table->integer('vianda_id');
            $table->date('fecha_solicitud');
            $table->date('fecha_entrega');
            $table->unsignedInteger('vianda_id');
            $table->foreign('vianda_id')->references('id')->on('viandas');
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pedidos');
    }

}
