<?php

use App\Http\Livewire\Repuestos;
use Illuminate\Support\Facades\Route;


Route::get('dash/tecnico/repuestos', function(){

    return view('dash.repuesto.index');
});
