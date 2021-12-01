@extends('layouts.dash')


@section('contenido')
<div>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Estado de solicitud</li>
        </ol>
    </nav>
</div>

@livewire('estado-solicitud.estado-solicitudes')
@endsection


@livewireScripts
<script type="text/javascript">
    window.Livewire.on('estadoGuardar', () => {
        $('#crearEstado').modal('hide');
        $('#updateEstado').modal('hide');
    });

    Livewire.on('storeE' , (message) =>{
            Swal.fire(
                'Buen trabajo!',
                message,
                'success'
                )
        });

    Livewire.on('updateEstado',()=>{
        Swal.fire({
            title: '¿Quieres guardar los cambios?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `No guardar`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                Livewire.emit('actualizarEstado')
                Swal.fire('Actualizado!', '', 'success')
              } else if (result.isDenied) {
                Swal.fire('No se han realizado cambios', '', 'info')
              }
            })
          });

    Livewire.on('deleteEstado', id =>{
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
            Livewire.emit('EliminarEstado', id)
            Swal.fire(
              '¡Eliminado!',
            'Estado solicitud eliminado correctamente',
            'success'
            )
          }
        })
        });

</script>

