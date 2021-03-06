<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoSolicitudServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_solicitud_servicio', function (Blueprint $table) {
            $table->id();
            $table->date("fechaIncio")->nullable();
            $table->date("fechaFin")->nullable();
            //relaicon con la tabla estado y solcitud de servicio

            $table->unsignedBigInteger("solicitud_id")->nullable();
            $table->unsignedBigInteger("estado_id")->nullable();

            $table->foreign("solicitud_id")->references("id")->on("solicitud_servicios")->onDelete("cascade")->onUpdate('cascade');
            $table->foreign("estado_id")->references("id")->on("estados")->onDelete("cascade")->onUpdate('cascade');



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
        Schema::dropIfExists('estado_solicitud_servicio');
    }
}
