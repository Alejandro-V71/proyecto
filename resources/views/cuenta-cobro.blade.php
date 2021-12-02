
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <header>

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <img src="../public/argon/img/brand/logo.jpeg" class="mx-auto" alt="logo">
                        </th>
                        <th class="text-center text-warning  bg-secondary">Cuenta de Cobro

                            <p class="text-white">Información de la motocicleta y precios </p>
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </header>

       <div class="bg-light">
        <table class="table">
            <thead>
                <tr>

                    <th class="text-center text-danger ">Datos de la Motocicleta</th>
                    <th class="text-center text-danger"> Datos del Usuario</th>

                </tr>
            </thead>
            <tbody>
                <tr >
                    <td>
                    @foreach ( $reportes as  $reporte)
                    <p class="text-secondary"> Placa: <span class="text-dark">{{$reporte->placaMotocicleta}}</span></p>
                    <p class="text-secondary"> Color: <span class="text-dark">{{$reporte->colorMotocicleta}}</span></p>
                    <p class="text-secondary"> Cilindraje: <span class="text-dark"> {{$reporte->cilindraje}}</span></p>
                     <p class="text-secondary"> Kilometraje: <span class="text-dark"> {{$reporte->kilometraje}}</span></p>
                     <p class="text-secondary"> Linea: <span class="text-dark"> {{$reporte->nombreLinea}}</span></p>
                     <p class="text-secondary"> Marca: <span class="text-dark"> {{$reporte->nombreMarca}}</span></p>
                     <p class="text-secondary"> Categoría: <span class="text-dark"> {{$reporte->nombreCategoria}}</span></p>
                        @endforeach
                    </td>
                    <td  >
                        @foreach ( $reportes as  $reporte)
                         <p class="text-secondary"> Nombre Usuario: <span class="text-dark">{{$reporte->name}}</span></p>
                         <p class="text-secondary"> Email: <span class="text-dark">{{$reporte->email}}</span></p>
                        @endforeach
                        </td>
                </tr>

            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>

                    <th class="text-center text-danger ">información de la Solicitud</th>
                    <th class="text-center text-danger ">Diagnóstico</th>

                </tr>
            </thead>
            <tbody>
                <tr >
                    <td  >
                    @foreach ( $reportes as  $reporte)
                     <p class="text-secondary"> Titulo de solicitud: <span class="text-dark">{{$reporte->title}}</span></p>
                     <p class="text-secondary"> Hora: <span class="text-dark">{{$reporte->horaSolcitudServicio}}</span></p>
                     <p class="text-secondary"> Descripción del problema: <span class="text-dark"> {{$reporte->descripcionProblema}}</span></p>
                     <p class="text-secondary"> Fecha inicio: <span class="text-dark"> {{$reporte->start}}</span></p>
                     <p class="text-secondary"> Fecha fin: <span class="text-dark"> {{$reporte->end}}</span></p>

                        @endforeach
                    </td>
                    <td >
                        @foreach ( $reportes as  $reporte)
                         <p class="text-secondary"> Diagnóstico: <span class="text-dark">{{$reporte->diagnostico}}</span></p>
                         <p class="text-secondary"> Nombre del servicio: <span class="text-dark">{{$reporte->nombreServicio}}</span></p>
                         <p class="text-secondary"> Precio del servicio: <span class="text-dark">{{$reporte->precioTotal}}</span></p>
                        @endforeach
                        </td>
                </tr>

            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>

                    <th class="text-center text-danger ">Repuestos</th>
                    <th class="text-center text-danger ">Total</th>

                </tr>
            </thead>
            <tbody>
                <tr >

                    <td >
                        @foreach ( $reportes as  $reporte)
                         <p class="text-secondary"> Repuestos: <span class="text-dark">{{$reporte->nombreRepuesto}}</span></p>
                         <p class="text-secondary"> Precios: <span class="text-dark">{{$reporte->precioRepuesto}}</span></p>
                         <p class="text-secondary"> Descripción: <span class="text-dark">{{$reporte->descripcionRepuesto}}</span></p>
                        @endforeach
                    </td>




                    
                </tr>

            </tbody>
        </table>
       </div>


    <footer style="clear: both">
        <table class="table">
            <thead>
                <tr>

                    <th class="text-center text-warning  bg-secondary">Motorbike fix


                        <p class="text-white text-sm">Información de la motocicleta y el diagnóstico de estado</p>


                    </th>


                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </footer>














    </body>
    </html>
