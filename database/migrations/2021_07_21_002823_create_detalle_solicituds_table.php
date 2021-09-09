<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_solicituds', function (Blueprint $table) {
            $table->id();
            $table->text("diagnostico");

            //relacion con con la tabla servicio y solicitud de servicio

            $table->unsignedBigInteger("solicitud_servicio_id")->nullable();
            $table->unsignedBigInteger("servicio_id")->nullable();

            $table->foreign("solicitud_servicio_id")->references("id")->on("solicitud_servicios")->onDelete("set null");
            $table->foreign("servicio_id")->references("id")->on("servicios")->onDelete("set null");

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
        Schema::dropIfExists('detalle_solicituds');
    }
}
