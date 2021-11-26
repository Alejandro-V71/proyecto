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
    window.livewire.on('userGuardar', () => {
        $('#exampleModal').modal('hide');
        $('#updateModal').modal('hide');
    });

    Livewire.on('servicioCreate',()=>{
        Swal.fire({
        icon: 'success',
        title: 'Buen trabajo!',
        text: `Servicio creado correctamente`,

        })
    });

    Livewire.on('updateServicio',()=>{
        Swal.fire({
            title: '¿Quieres guardar los cambios?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `No guardar`,
            }).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Actualizado!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('No se han realizado cambios', '', 'info')
  }
})
    });

    Livewire.on('deleteServicio',()=>{
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
    Swal.fire(
      '¡Eliminado!',
      'Solicitud eliminada correctamente',
      'success'
    )
  }
})
    });


</script>
