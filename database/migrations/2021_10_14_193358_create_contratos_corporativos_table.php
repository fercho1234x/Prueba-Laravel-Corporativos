<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_corporativos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('D_FechaInicio');
            $table->timestamp('D_FechaFin');
            $table->string('S_URLContrato', 255)->nullable();
            $table->unsignedBigInteger('corporativo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos_corporativos');
    }
}
