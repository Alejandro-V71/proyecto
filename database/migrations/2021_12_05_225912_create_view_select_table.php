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
        
        CREATE VIEW reporteEstado AS
        SELECT DISTINCT
    `d43kgnrlp6o9jh`.`lineas`.`nombreLinea` AS `nombreLinea`,
    `d43kgnrlp6o9jh`.`marcas`.`nombreMarca` AS `nombreMarca`,
    `d43kgnrlp6o9jh`.`categorias`.`nombreCategoria` AS `nombreCategoria`,
    `d43kgnrlp6o9jh`.`motocicletas`.`id` AS `id`,
    `d43kgnrlp6o9jh`.`motocicletas`.`placaMotocicleta` AS `placaMotocicleta`,
    `d43kgnrlp6o9jh`.`motocicletas`.`colorMotocicleta` AS `colorMotocicleta`,
    `d43kgnrlp6o9jh`.`motocicletas`.`cilindraje` AS `cilindraje`,
    `d43kgnrlp6o9jh`.`motocicletas`.`kilometraje` AS `kilometraje`,
    `d43kgnrlp6o9jh`.`motocicletas`.`categoria_id` AS `categoria_id`,
    `d43kgnrlp6o9jh`.`motocicletas`.`marca_id` AS `marca_id`,
    `d43kgnrlp6o9jh`.`users`.`name` AS `name`,
    `d43kgnrlp6o9jh`.`users`.`email` AS `email`,
    `d43kgnrlp6o9jh`.`solicitud_servicios`.`id` AS `solicitud_id`,
    `d43kgnrlp6o9jh`.`solicitud_servicios`.`title` AS `title`,
    `d43kgnrlp6o9jh`.`solicitud_servicios`.`horaSolcitudServicio` AS `horaSolcitudServicio`,
    `d43kgnrlp6o9jh`.`solicitud_servicios`.`descripcionProblema` AS `descripcionProblema`,
    `d43kgnrlp6o9jh`.`solicitud_servicios`.`Start` AS `start`,
    `d43kgnrlp6o9jh`.`solicitud_servicios`.`End` AS `end`,
    `d43kgnrlp6o9jh`.`estado_solicitud_servicio`.`estado_id` AS `estado_id`,
    `d43kgnrlp6o9jh`.`detalle_solicituds`.`diagnostico` AS `diagnostico`,
    `d43kgnrlp6o9jh`.`servicios`.`nombreServicio` AS `nombreServicio`,
    `d43kgnrlp6o9jh`.`servicios`.`precioTotal` AS `precioTotal`,
    `d43kgnrlp6o9jh`.`detalle_solicitud_repuesto`.`detalle_solicitud_id` AS `detalle_solicitud_id`
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
                                        `d43kgnrlp6o9jh`.`motocicletas`
                                    JOIN `d43kgnrlp6o9jh`.`lineas` ON
                                        (
                                            `d43kgnrlp6o9jh`.`lineas`.`id` = `d43kgnrlp6o9jh`.`motocicletas`.`linea_id`
                                        )
                                    )
                                JOIN `d43kgnrlp6o9jh`.`marcas` ON
                                    (
                                        `d43kgnrlp6o9jh`.`marcas`.`id` = `d43kgnrlp6o9jh`.`motocicletas`.`marca_id`
                                    )
                                )
                            JOIN `d43kgnrlp6o9jh`.`categorias` ON
                                (
                                    `d43kgnrlp6o9jh`.`categorias`.`id` = `d43kgnrlp6o9jh`.`motocicletas`.`categoria_id`
                                )
                            )
                        JOIN `d43kgnrlp6o9jh`.`users` ON
                            (
                                `d43kgnrlp6o9jh`.`users`.`id` = `d43kgnrlp6o9jh`.`motocicletas`.`user_id`
                            )
                        )
                    JOIN `d43kgnrlp6o9jh`.`solicitud_servicios` ON
                        (
                            `d43kgnrlp6o9jh`.`solicitud_servicios`.`user_id` = `d43kgnrlp6o9jh`.`users`.`id`
                        )
                    )
                JOIN `d43kgnrlp6o9jh`.`estado_solicitud_servicio` ON
                    (
                        `d43kgnrlp6o9jh`.`estado_solicitud_servicio`.`solicitud_id` = `d43kgnrlp6o9jh`.`solicitud_servicios`.`id`
                    )
                )
            JOIN `d43kgnrlp6o9jh`.`detalle_solicituds` ON
                (
                    `d43kgnrlp6o9jh`.`detalle_solicituds`.`solicitud_servicio_id` = `d43kgnrlp6o9jh`.`solicitud_servicios`.`id`
                )
            )
        JOIN `d43kgnrlp6o9jh`.`servicios` ON
            (
                `d43kgnrlp6o9jh`.`servicios`.`id` = `d43kgnrlp6o9jh`.`detalle_solicituds`.`servicio_id`
            )
        )
    JOIN `d43kgnrlp6o9jh`.`detalle_solicitud_repuesto` ON
        (
            `d43kgnrlp6o9jh`.`detalle_solicitud_repuesto`.`detalle_solicitud_id` = `d43kgnrlp6o9jh`.`detalle_solicituds`.`id`
        )
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
