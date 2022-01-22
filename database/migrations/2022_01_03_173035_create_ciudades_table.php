<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('provincia');
            $table->string('pais');
            $table->string('codigo_postal');
            $table->softDeletes();
            
        });
    }
    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
}
