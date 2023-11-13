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
        Schema::create('paciente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 50)->nullable();
            $table->string('apellidos', 50)->nullable();
            $table->string('cedula', 50)->nullable()->unique('cedula');
            $table->boolean('estado')->nullable();
            $table->string('sexo', 50)->nullable();
            $table->integer('edad')->nullable();
            $table->string('porcentajediscapacidad', 50)->nullable();
            $table->string('estadocivil', 50)->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('profesion', 50)->nullable();
            $table->string('instruccion', 50)->nullable();
            $table->string('nacionalidad', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('registroconadis', 50)->nullable();
            $table->date('fechaingreso')->nullable();
            $table->time('horaingreso')->nullable();
            $table->string('tipodiscapacidad', 50)->nullable();
            $table->string('tipocedula', 60)->nullable();
            $table->binary('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
};
