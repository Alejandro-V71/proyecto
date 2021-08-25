<?php

use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;


Route::get('dash/tecnico/repuestos', function(){

    return view('dash.repuesto.index');
});

Route::get('dash/tecnico/calendario', function(){

    return view('dash.calendario.index');
});

Route::post('dash/tecnico/calendario/agregar',[SolicitudController::class,'store']);
Route::post('dash/tecnico/calendario/editar/{id}',[SolicitudController::class,'edit']);
Route::get('dash/tecnico/calendario/mostrar',[SolicitudController::class,'index']);
