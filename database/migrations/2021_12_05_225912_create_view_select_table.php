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
        DB::statement("CREATE VIEW reporteEstado AS SELECT DISTINCT
        `proyecto`.`lineas`.`nombreLinea` AS `nombreLinea`,
        `proyecto`.`marcas`.`nombreMarca` AS `nombreMarca`,
        `proyecto`.`categorias`.`nombreCategoria` AS `nombreCategoria`,
        `proyecto`.`motocicletas`.`id` AS `id`,
        `proyecto`.`motocicletas`.`placaMotocicleta` AS `placaMotocicleta`,
        `proyecto`.`motocicletas`.`colorMotocicleta` AS `colorMotocicleta`,
        `proyecto`.`motocicletas`.`cilindraje` AS `cilindraje`,
        `proyecto`.`motocicletas`.`kilometraje` AS `kilometraje`,
        `proyecto`.`motocicletas`.`categoria_id` AS `categoria_id`,
        `proyecto`.`motocicletas`.`marca_id` AS `marca_id`,
        `proyecto`.`users`.`name` AS `name`,
        `proyecto`.`users`.`email` AS `email`,
        `proyecto`.`solicitud_servicios`.`id` AS `solicitud_id`,
        `proyecto`.`solicitud_servicios`.`title` AS `title`,
        `proyecto`.`solicitud_servicios`.`horaSolcitudServicio` AS `horaSolcitudServicio`,
        `proyecto`.`solicitud_servicios`.`descripcionProblema` AS `descripcionProblema`,
        `proyecto`.`solicitud_servicios`.`Start` AS `start`,
        `proyecto`.`solicitud_servicios`.`End` AS `end`,
        `proyecto`.`estado_solicitud_servicio`.`estado_id` AS `estado_id`,
        `proyecto`.`detalle_solicituds`.`diagnostico` AS `diagnostico`,
        `proyecto`.`servicios`.`nombreServicio` AS `nombreServicio`,
        `proyecto`.`servicios`.`precioTotal` AS `precioTotal`,
        `proyecto`.`detalle_solicitud_repuesto`.`detalle_solicitud_id` AS `detalle_solicitud_id`
    FROM
        (
            (
                (
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            `proyecto`.`motocicletas`
                                        JOIN `proyecto`.`lineas` ON
                                            (
                                                `proyecto`.`lineas`.`id` = `proyecto`.`motocicletas`.`linea_id`
                                            )
                                        )
                                    JOIN `proyecto`.`marcas` ON
                                        (
                                            `proyecto`.`marcas`.`id` = `proyecto`.`motocicletas`.`marca_id`
                                        )
                                    )
                                JOIN `proyecto`.`categorias` ON
                                    (
                                        `proyecto`.`categorias`.`id` = `proyecto`.`motocicletas`.`categoria_id`
                                    )
                                )
                            JOIN `proyecto`.`users` ON
                                (
                                    `proyecto`.`users`.`id` = `proyecto`.`motocicletas`.`user_id`
                                )
                            )
                        JOIN `proyecto`.`solicitud_servicios` ON
                            (
                                `proyecto`.`solicitud_servicios`.`user_id` = `proyecto`.`users`.`id`
                            )
                        )
                    JOIN `proyecto`.`estado_solicitud_servicio` ON
                        (
                            `proyecto`.`estado_solicitud_servicio`.`solicitud_id` = `proyecto`.`solicitud_servicios`.`id`
                        )
                    )
                JOIN `proyecto`.`detalle_solicituds` ON
                    (
                        `proyecto`.`detalle_solicituds`.`solicitud_servicio_id` = `proyecto`.`solicitud_servicios`.`id`
                    )
                )
            JOIN `proyecto`.`servicios` ON
                (
                    `proyecto`.`servicios`.`id` = `proyecto`.`detalle_solicituds`.`servicio_id`
                )
            )
        JOIN `proyecto`.`detalle_solicitud_repuesto` ON
            (
                `proyecto`.`detalle_solicitud_repuesto`.`detalle_solicitud_id` = `proyecto`.`detalle_solicituds`.`id`
            )
        )");
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
