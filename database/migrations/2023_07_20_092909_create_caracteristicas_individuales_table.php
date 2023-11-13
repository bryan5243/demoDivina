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
        Schema::create('caracteristicas_individuales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->nullable();
            $table->string('evolucion_enfermedad')->nullable();
            $table->string('situacion_economica')->nullable();
            $table->text('motivo_preocupacion')->nullable();
            $table->string('problema_social')->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('gusto_comida')->nullable();
            $table->string('antecedentes_patologicos_familiares')->nullable();
            $table->string('antecedentes_patologicos_personales')->nullable();
            $table->integer('id_necesita_ayuda')->nullable();
            $table->string('motivo_consulta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_individuales');
    }
};
