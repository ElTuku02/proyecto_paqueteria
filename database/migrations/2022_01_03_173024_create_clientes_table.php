<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->string('telefono', 12);
            $table->string('email')->unique();
            $table->date('f_nacimiento');
            $table->string('procedencia');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
