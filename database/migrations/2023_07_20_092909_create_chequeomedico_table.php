<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chequeomedico', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('notapreocupacion', 100)->nullable();
            $table->integer('id_paciente')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chequeomedico');
    }
};
