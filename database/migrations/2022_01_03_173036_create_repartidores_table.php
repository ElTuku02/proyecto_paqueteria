<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepartidoresTable extends Migration
{
    public function up()
    {
        Schema::create('repartidores', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->string('telefono', 12);
            $table->string('email')->unique();
            $table->date('f_nacimiento');
            $table->unsignedBigInteger('ciudad_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('repartidores');
    }
}
