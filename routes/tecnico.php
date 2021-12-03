<?php


use App\Http\Controllers\SolicitudController;
use App\Http\Livewire\ReporteCuentaController;
use App\Http\Livewire\ReporteEstadoController;
use App\Http\Livewire\ReporteFinal;
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
Route::get('dash/tecnico/reporte/estado/{titulo}/{estado}',[ReporteEstadoController::class ,'PDF']);

Route::get('dash/tecnico/cuenta', function(){

    return view('dash.reporte.index-cuenta');
})->middleware('can:dash.reporteCuenta.index')->name('reporteCuenta');
Route::get('dash/tecnico/cuenta/{problema}/{id}/{estado}',[ReporteCuentaController::class ,'PDF']);


//Ruta para el reporte final

Route::get('dash/tecnico/reporte/final', function(){

    return view('dash.reporte.index-final');
})->name('reporteFinal');
Route::get('dash/tecnico/reporte/final/{problema}/{id}/{solicitud}',[ReporteFinal::class ,'PDF']);

//ruta para motocicleta
Route::get('dash/cliente/motocicletas', function () {
    // abort_if(Gate::denies('motocicleta_index'), 403);
    return view('dash.motocicleta.index');
})->name('motocicletas');
