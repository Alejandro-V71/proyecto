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
        
        CREATE VIEW reporteEstado AS SELECT
        lineas.nombreLinea AS nombreLinea,
        marcas."nombreMarca" AS nombreMarca,
        categorias."nombreCategoria" AS nombreCategoria,
        motocicletas."id" AS id,
        motocicletas."placaMotocicleta" AS placaMotocicleta,
        motocicletas."colorMotocicleta" AS colorMotocicleta,
        motocicletas."cilindraje" AS cilindraje,
        motocicletas."kilometraje" AS kilometraje,
        motocicletas."categoria_id" AS categoria_id,
        motocicletas."marca_id" AS marca_id,
        users."name" AS NAME,
        users."email" AS email,
        solicitud_servicios."id" AS solicitud_id,
        solicitud_servicios."title" AS title,
        solicitud_servicios."horaSolcitudServicio" AS horaSolcitudServicio,
        solicitud_servicios."descripcionProblema" AS descripcionProblema,
        solicitud_servicios."Start" AS START,
        solicitud_servicios."End" AS END,
    estado_solicitud_servicio."estado_id" AS estado_id,
    detalle_solicituds."diagnostico" AS diagnostico,
    servicios."nombreServicio" AS nombreServicio,
    servicios."precioTotal" AS precioTotal,
    detalle_solicitud_repuesto."detalle_solicitud_id" AS detalle_solicitud_id
FROM
    motocicletas
JOIN lineas ON(
        lineas."id" = motocicletas."linea_id"
    )
JOIN marcas ON(
        marcas."id" = motocicletas."marca_id"
    )
JOIN categorias ON(
        categorias."id" = motocicletas."categoria_id"
    )
JOIN users ON(
        users."id" = motocicletas."user_id"
    )
JOIN solicitud_servicios ON(
        solicitud_servicios."user_id" = users."id"
    )
JOIN estado_solicitud_servicio ON(
        estado_solicitud_servicio."solicitud_id" = solicitud_servicios."id"
    )
JOIN detalle_solicituds ON(
        detalle_solicituds."solicitud_servicio_id" = solicitud_servicios."id"
    )
JOIN servicios ON(
        servicios."id" = detalle_solicituds."servicio_id"
    )
JOIN detalle_solicitud_repuesto ON(
        detalle_solicitud_repuesto."detalle_solicitud_id" = detalle_solicituds."id"
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
