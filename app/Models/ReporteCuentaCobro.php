<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteCuentaCobro extends Model
{
    use HasFactory;

    protected $table="reportecuentacobro";
    public $timestamps = false;
    protected $fillable = [


        'placaMotocicleta',
        'colorMotocicleta',
        'cilindraje',
        'kilometraje',
        'nombreLinea',
        'nombreMarca',
        'name',
        'email',
        'title',
        'horaSolicitudServicio',
        'descripcionProblema',
        'start',
        'end',
        'diagnostico',
        'nombreServicio',
        'precioTotal',
        'nombreRepuesto',
        'descripcionRepuesto',
        'precioRepuesto',
     

    ];
}
