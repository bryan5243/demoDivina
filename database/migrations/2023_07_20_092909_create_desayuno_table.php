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
        Schema::create('desayuno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dosis', 250)->nullable();
            $table->string('medicamento')->nullable();
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
        Schema::dropIfExists('desayuno');
    }
};
