@extends('layouts.dash')

@section('contenido')

@livewire('detalle-solicitud.detalles')

@livewireScripts
<script type="text/javascript">
    Livewire.on('guardarD',()=>{
        Swal.fire({
        icon: 'success',
        title: '¡Buen trabajo!',
        text: `Detalle creado correctamente

        `,

        })
    });

    Livewire.on('updateD',()=>{
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

    window.Livewire.on('deleteD',()=>{
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
      'Detalle eliminado correctamente',
      'success'
    )
  }
})
    });

</script>

