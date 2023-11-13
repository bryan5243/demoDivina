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
        Schema::table('madre', function (Blueprint $table) {
            $table->foreign(['id_paciente'], 'madre_id_paciente_fkey')->references(['id'])->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('madre', function (Blueprint $table) {
            $table->dropForeign('madre_id_paciente_fkey');
        });
    }
};
