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
        Schema::create('lugarnacimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->nullable();
            $table->string('canton', 50)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('parroquia', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugarnacimiento');
    }
};
