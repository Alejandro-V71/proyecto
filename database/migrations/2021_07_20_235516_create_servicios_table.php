<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string("estadoServicio",20);
            $table->string("nombreServicio",20);
            $table->float("precioTotal");

            //relacion con la tabla tipo de servicio
            $table->unsignedBigInteger("tipo_de_servicio_id")->nullable();
            $table->foreign("tipo_de_servicio_id")->references("id")->on("tipo_de_servicios")->onDelete("set null");


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
        Schema::dropIfExists('servicios');
    }
}
