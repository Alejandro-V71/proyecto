<?php

use Illuminate\Support\Facades\Route;

Route::get('dash/asesor/usuario', function () {
            return view('dash.usuario.index');
})->middleware('can:dash.usuario.index')->name('usuarios');

Route::get('dash/asesor/solicitudes', function () {
    return view('dash.solicitudes.index');
})->middleware('can:dash.solicitudes.index');

Route::get('dash/asesor/estadoSolicitud', function () {
    return view('dash.solicitudes.estado');
})->middleware('can:dash.solicitudes.estado');

Route::get('dash/asesor/detalle', function () {
    return view('dash.solicitudes.detalle');
})->middleware('can:dash.solicitudes.detalle');

Route::get('dash/asesor/servicio', function () {
    return view('dash.servicios.servicio');
})->middleware('can:dash.servicios.servicio');
Route::get('dash/asesor/rol', function () {
    return view('dash.rol.index');
})->name('role');

