<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewSelectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        
        CREATE VIEW reporteEstado AS SELECT DISTINCT
        motocicletas.id,
        marcas.id.
        categorias.id
FROM
    motocicletas
JOIN lineas ON(
        lineas.id = motocicletas.linea_id
    )
JOIN marcas ON(
        marcas.id = motocicletas.marca_id
    )
JOIN categorias ON(
        categorias.id = motocicletas.categoria_id
    )
JOIN users ON(
        users.id = motocicletas.user_id
    )
JOIN solicitud_servicios ON(
        solicitud_servicios.user_id = users.id
    )
JOIN estado_solicitud_servicio ON(
        estado_solicitud_servicio.solicitud_id = solicitud_servicios.id
    )
JOIN detalle_solicituds ON(
        detalle_solicituds.solicitud_servicio_id = solicitud_servicios.id
    )
JOIN servicios ON(
        servicios.id = detalle_solicituds.servicio_id
    )
JOIN detalle_solicitud_repuesto ON(
        detalle_solicitud_repuesto.detalle_solicitud_id = detalle_solicituds.id
    )
        
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW reporteEstado");
    }
}
