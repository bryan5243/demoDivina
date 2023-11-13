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
        Schema::create('residente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->nullable();
            $table->float('peso', 0, 0)->nullable();
            $table->string('colorojos', 50)->nullable();
            $table->string('dentadurapostiza')->nullable();
            $table->string('usalentes')->nullable();
            $table->float('estatura', 0, 0)->nullable();
            $table->string('cicatrizidentifica')->nullable();
            $table->string('camina')->nullable();
            $table->string('colorpelo', 50)->nullable();
            $table->string('usaaudifonos')->nullable();
            $table->string('aparatomovilizarse')->nullable();
            $table->string('cualdiagnostico', 80)->nullable();
            $table->string('cualmedicamento', 80)->nullable();
            $table->string('medicamento')->nullable();
            $table->string('diagnostico')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residente');
    }
};
