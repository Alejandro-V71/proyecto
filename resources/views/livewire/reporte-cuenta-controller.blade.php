<div>
    <div class="row d-flex">

        @foreach ($reportes as $reporte )
        <div class="card ml-2 mr-2" >
            <div class="card-header">
                <h5 class="card-title text-bold">{{$reporte->title}}</h5>
            </div>
            <div class="card-body">



                <p class="card-text">Placa: {{$reporte->placaMotocicleta}}</p>
                <p class="card-text">Color: {{$reporte->colorMotocicleta}}</p>
                <p class="card-text">Propietario: {{$reporte->name}}</p>
                <p class="card-text">Email: {{$reporte->email}}</p>

                  <p class="card-text">Descripción del problema: {{$reporte->descripcionProblema}}</p>

                <p class="card-text">{{$reporte->diagnostico}}</p>



            <a   href="{{ url('dash/tecnico/cuenta/'. $reporte->title)}}"  class="btn btn-danger btn-sm" >Generar Reporte <i class="far fa-file-pdf ml-1"></i></a>

            </div>
          </div>
          @endforeach

</div>
</div>
