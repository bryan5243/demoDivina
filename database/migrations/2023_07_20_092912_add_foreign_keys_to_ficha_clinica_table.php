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
        Schema::table('ficha_clinica', function (Blueprint $table) {
            $table->foreign(['id_paciente'], 'ficha_clinica_id_paciente_fkey')->references(['id'])->on('paciente');
            $table->foreign(['id_paciente'], 'ficha_clinica_id_paciente_fkey1')->references(['id'])->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_clinica', function (Blueprint $table) {
            $table->dropForeign('ficha_clinica_id_paciente_fkey');
            $table->dropForeign('ficha_clinica_id_paciente_fkey1');
        });
    }
};
