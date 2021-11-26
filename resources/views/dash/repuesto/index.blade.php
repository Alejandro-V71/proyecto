@extends('layouts.dash')

@section('contenido')
<div>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Repuestos</li>
        </ol>
    </nav>
</div>

@livewire('repuestos')
@endsection
    @livewireScripts

    <script type="text/javascript">
        window.livewire.on('RepuestoStore', () => {
            $('#registroRepuesto').modal('hide');
            $('#updateModal').modal('hide');

        });
        //alerta de insercion y acutualización
        Livewire.on('alert' , (message) =>{
            Swal.fire(
                'Buen trabajo!',
                message,
                'success'
                )
        });
        //alerta de eliminación con  confirmación
        Livewire.on('deleteRepuesto' , repuestoId =>{
            Swal.fire({
            title: 'Estás seguro de eliminar el registro?',
            text: "Esta acción no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, elimínalo!'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('repuestos' ,'delete' , repuestoId)

                Swal.fire(

                'Eliminado!',
                'El registro fue eliminado correctamente',
                'success'
                )
            }
            })
        });
    </script>


