<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proveedors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();

            $table->string('razon_social')->unique();
            $table->string('nit')->nullable()->unique()->default('0');
            $table->string('email')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable()->unique();
            $table->string('celular')->unique()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
