@extends('layouts.dash')


@section('contenido')

<div>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Servicios</li>
        </ol>
    </nav>
</div>

@livewire('servicios.servicios')

@endsection

@livewireScripts

<script type="text/javascript">
    window.livewire.on('Servicio', () => {
        $('#exampleModal').modal('hide');
        $('#updateModal').modal('hide');
    });

    Livewire.on('deleteServicio', id =>{
        Swal.fire({
          title: '¿Estas seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, borrar!'
        }).then((result) => {
          if (result.isConfirmed) {
            //console.log('entro')
            //console.log(id);
            Livewire.emit( 'eliminarServicio' ,id)
            Swal.fire(
              '¡Eliminado!',
              'Solicitud eliminada correctamente',
              'success'
              )
            }
          })
        });

    Livewire.on('servicioCreate',()=>{
      Livewire.emit('storeServicio')
        Swal.fire({
        icon: 'success',
        title: 'Buen trabajo!',
        text: `Servicio creado correctamente`,
        })
    });

    Livewire.on('actualizarServicio',()=>{
        Swal.fire({
            title: '¿Quieres guardar los cambios?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `No guardar`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                Livewire.emit('updateServicio')
                Swal.fire('¡Actualizado!',
                '',
                'success')
              }
            })
          });



</script>

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#ServiciosAlgo').DataTable({
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
