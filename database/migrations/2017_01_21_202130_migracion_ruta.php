<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigracionRuta extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ruta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha_inicio');
            $table->string('hora_inicio');
            $table->string('fecha_fin');
            $table->string('hora_fin');
            $table->integer('celular_id')->unsigned();
            $table->foreign('celular_id')->references('id')->on('celular')->onDelete('cascade');
            $table->integer('preventista_id')->unsigned();
            $table->foreign('preventista_id')->references('id')->on('preventista')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ruta');
    }

}
