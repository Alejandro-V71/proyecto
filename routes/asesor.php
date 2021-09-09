<?php

use Illuminate\Support\Facades\Route;

Route::get('dash/asesor/usuario', function () {
            return view('dash.usuario.index');
})->middleware('can:dash.usuario.index');
<<<<<<< HEAD

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

=======
>>>>>>> 7f908437bdaca75d34e39ea78b7d186dfbb1d8b0
