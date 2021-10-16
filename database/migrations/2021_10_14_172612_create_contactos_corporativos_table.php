<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos_corporativos', function (Blueprint $table) {
            $table->id();
            $table->string('S_Nombre', 45);
            $table->string('S_Puesto', 45);
            $table->string('S_Comentarios', 255)->nullable();
            $table->string('S_TelefonoFijo', 12)->nullable();
            $table->string('S_TelefonoMovil', 12)->nullable();
            $table->string('S_Email', 45);
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
        Schema::dropIfExists('contactos_corporativos');
    }
}
