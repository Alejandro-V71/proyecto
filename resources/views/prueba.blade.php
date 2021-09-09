
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>


    <div class="bg-primary">
        <h4 class="text-center">Reporte Estado</h1>
    </div>
    <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <table class="table">
                   <thead>
                       <tr>
                           <th>Placa</th>
                           <th>Color</th>
                           <th>Cilindraje</th>
                           <th>Kilometraje</th>
                           <th>Categoria</th>
                           <th>Marca</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                        @foreach ( $reportes as  $reporte)
                        <td>{{$reporte->placaMotocicleta}}</td>
                        <td> {{$reporte->colorMotocicleta}}</td>
                        <td> {{$reporte->cilindraje}}</td>
                        <td> {{$reporte->kilometraje}}</td>
                        <td> {{$reporte->nombreLinea}}</td>
                        <td>{{$reporte->nombreMarca}}</td>
                        @endforeach
                       </tr>

                   </tbody>
               </table>

           </div>
       </div>
       <div class="row">
        <div class="col-md-5">
         <table class="table">
             <thead>
                 <tr>
                     <th>Nombre</th>
                     <th>Email</th>

                 </tr>
             </thead>
             <tbody>
                 <tr>
                  @foreach ( $reportes as  $reporte)
                  <td>{{$reporte->name}}</td>
                  <td> {{$reporte->email}}</td>
                  @endforeach
                 </tr>

             </tbody>
         </table>
        </div>
    </div>
       <div class="row">


           <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Hora</th>
                        <th>Descripcion</th>
                        <th>Start</th>
                        <th>End</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                     @foreach ( $reportes as  $reporte)
                     <td >{{$reporte->title}}</td>
                     <td>{{$reporte->horaSolicitudServicio}}</td>
                     <td>{{$reporte->descripcionProblema}}</td>
                     <td>{{$reporte->start}}</td>
                     <td>{{$reporte->end}}</td>
                     <td></td>
                     @endforeach
                    </tr>

                </tbody>
            </table>
           </div>
       </div>

       <div class="row">
           <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Diagnostico</th>
                        <th>Servicio</th>
                        <th>precio Servicio</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                     @foreach ( $reportes as  $reporte)
                     <td >{{$reporte->diagnostico}}</td>
                     <td>{{$reporte->nombreServicio}}</td>
                     <td>{{$reporte->precioTotal}}</td>

                     <td></td>
                     @endforeach
                    </tr>

                </tbody>
            </table>
           </div>
       </div>
    </div>

















</body>
</html>
