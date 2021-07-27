<?php

use Illuminate\Support\Facades\Route;

Route::get('dash/asesor/usuario', function () {
            return view('dash.usuario.index');
});
