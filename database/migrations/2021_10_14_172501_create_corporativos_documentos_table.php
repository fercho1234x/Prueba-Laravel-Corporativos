<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporativosDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporativos_documentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('corporativo_id');
            $table->unsignedBigInteger('documento_id');
            $table->string('S_ArchivoUrl', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporativos_documentos');
    }
}
