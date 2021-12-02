<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleSolicitudRepuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_solicitud_repuesto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("detalle_solicitud_id");
            $table->unsignedBigInteger("repuesto_id");

            $table->foreign("detalle_solicitud_id")->references("id")->on("detalle_solicituds")->onDelete("cascade")->onUpdate('cascade');
            $table->foreign("repuesto_id")->references("id")->on("repuestos")->onDelete("cascade")->onUpdate('cascade');

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
        Schema::dropIfExists('detalle_solicitud_repuesto');
    }
}
