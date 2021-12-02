@extends('layouts.dash')

@section('contenido')
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
      </ol>
    </nav>

    @livewire('users.users')


@endsection

@livewireScripts

<script>
     Livewire.on('estado' , userid =>{

        Swal.fire({
            title: '¿Está seguro de modificar el Estado?',
            text: "Sí modifica el estado puede restringir el acceso al sistema del usuario!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cambiar!'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('users.users' ,'cambiarEstado' , userid)
                Swal.fire(
                'Buen trabajo!',
                'El estado se ha actualizado correctamente.',
                'success'
                )
            }
            })

});
</script>
<script type="text/javascript">
    window.livewire.on('UserStore', () => {
        $('#exampleModal').modal('hide');
        $('#updateModal').modal('hide');
    });
    //alerta sobre precaución
    Livewire.on('warningUser' , () =>{

        Swal.fire({
        icon: 'warning',
        title: 'Lea con atención',
        text: `Por cuestiones de seguridad ningun usuario puede crear contraseñas
                o asignar nombre se usuario a otros, por este motivo nosotro le enviaremos las
                al correo del usuario

        `,

        })
    }),
    //alerta de proceso exitoso
    Livewire.on('successUser' , () =>{

        Swal.fire({
        icon: 'success',
        title: 'Buen trabajo!',
        text: `Usuario creado correctamente

        `,

        })


    //alerta de cambio de estado(confirmación)

});
</script>

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#Users').DataTable({
        "lengthMenu": [[5,10,25,-1], [5,10,25, "Todos"]],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registro por página",
            "zeroRecords": "Ningún registro coincide - ¡Lo sentimos!",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado entre _MAX_ registros totales)",
            'search': 'Buscar:',
            'paginate': {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
    });
} );
</script>
@endsection

