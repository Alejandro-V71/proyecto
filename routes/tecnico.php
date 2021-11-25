<?php

use App\Http\Controllers\Rerporte\PdfEstadoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Livewire\ReporteEstadoController;
use Illuminate\Support\Facades\Route;


Route::get('dash/tecnico/repuestos', function(){

    return view('dash.repuesto.index');
})->name('repuesto');

Route::get('dash/tecnico/calendario', function(){

    return view('dash.calendario.index');
})->name('calendario');

Route::post('dash/tecnico/calendario/agregar',[SolicitudController::class,'store']);
Route::post('dash/tecnico/calendario/editar/{id}',[SolicitudController::class,'edit']);
Route::get('dash/tecnico/calendario/mostrar',[SolicitudController::class,'index']);

Route::get('dash/tecnico/reporte', function(){

    return view('dash.reporte.index');
})->name('reporte');
Route::get('dash/tecnico/reporte/estado/{problema}',[ReporteEstadoController::class ,'PDF']);
