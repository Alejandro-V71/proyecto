<?php

namespace App\Http\Controllers;

use App\Models\SolicitudServicio;
use Illuminate\Http\Request;



class SolicitudController extends Controller
{
    //
    public function index(Request $request)
    {
        // on page load this ajax code block will be run


            $data = SolicitudServicio::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title','horaSolcitudServicio','descripcionProblema', 'start', 'end']);

            return response()->json($data);


        return view('dash.calendario.index');
    }

    public function edit($id){

        $solicitud = SolicitudServicio::find($id);
        return response()->json($solicitud);
    }

}
