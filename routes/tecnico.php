<?php


use App\Http\Controllers\SolicitudController;
use App\Http\Livewire\ReporteCuentaController;
use App\Http\Livewire\ReporteEstadoController;

use Illuminate\Support\Facades\Route;


Route::get('dash/tecnico/repuestos', function(){

    return view('dash.repuesto.index');
})->middleware('can:dash.repuestos.index')->name('repuesto');

Route::get('dash/tecnico/calendario', function(){

    return view('dash.calendario.index');
})->middleware('can:dash.calendario.index')->name('calendario');

Route::post('dash/tecnico/calendario/agregar',[SolicitudController::class,'store']);
Route::post('dash/tecnico/calendario/editar/{id}',[SolicitudController::class,'edit']);
Route::get('dash/tecnico/calendario/mostrar',[SolicitudController::class,'index']);

Route::get('dash/tecnico/reporte', function(){

    return view('dash.reporte.index');
})->middleware('can:dash.reporteEstado.index')->name('reporte');
Route::get('dash/tecnico/reporte/estado/{problema}',[ReporteEstadoController::class ,'PDF']);

Route::get('dash/tecnico/cuenta', function(){

    return view('dash.reporte.index-cuenta');
})->name('reporteCuenta');
Route::get('dash/tecnico/cuenta/{problema}',[ReporteCuentaController::class ,'PDF']);
