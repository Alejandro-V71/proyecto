@extends('layouts.dash')


@section('contenido')
<div>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
      <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
      <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Solicitudes</li>
    </ol>
  </nav>
</div>
<br>
@if (Auth::user()->hasRole('Cliente'))
    <h3>Bienvenido</h3>
@else
<button type="submit" data-toggle="collapse" href="#mostrarDetalles" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i> Detalles</button>
<button type="submit" data-toggle="collapse" href="#table" class="btn btn-success btn-sm">Solicitudes</button>
@endif


@livewire('solicitudes.solicitud-servicios')
@endsection


@livewireScripts

<script>

    Livewire.on('solicitud',()=>{
        console.log('entra')
        Swal.fire({
        icon: 'success',
        title: '¡Buen trabajo!',
        text: `Solicitud creada correctamente`,

        })
    });

    Livewire.on('actualizarSolicitud',()=>{
        Swal.fire({
            title: '¿Quieres guardar los cambios?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `No guardar`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                Livewire.emit('updateSolicitud')
                 Swal.fire('Actualizado!', '', 'success')
                }
              })
    });

    Livewire.on('deleteSolicitud', id =>{
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
    Livewire.emit( 'eliminarSolicitud' ,id)
    Swal.fire(
      '¡Eliminado!',
      'Solicitud eliminada correctamente',
      'success'
    )
  }
})
    });

//detalle de solicitud

Livewire.on('Detalle', () => {
        $('#storeDetalle').modal('hide');
        $('#updateDetalle').modal('hide');
    });


Livewire.on('guardarD',()=>{
  Livewire.emit( 'storeDetalle')
    console.log('entro al mensaje');
        Swal.fire({
        icon: 'success',
        title: '¡Buen trabajo!',
        text: `Detalle creado correctamente

        `,

        })
    });

    Livewire.on('updateDetalle',()=>{
        Swal.fire({
            title: '¿Quieres guardar los cambios?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `No guardar`,
            }).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
Livewire.emit('actualizarDetalle')
    Swal.fire('Actualizado!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('No se han realizado cambios', '', 'info')
  }
})
    });

    window.Livewire.on('deleteDetalle', id =>{
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
    Livewire.emit('eliminarDetalle', id)
    Swal.fire(
      '¡Eliminado!',
      'Detalle eliminado correctamente',
      'success'
    )
  }
})
    });
</script>


@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>

$(document).ready(function() {
    $('#SolicitudServicio').DataTable({
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

$(document).ready(function() {
    $('#DetalleSolicitud').DataTable({
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


