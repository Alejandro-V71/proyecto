@extends('layouts.dash')



@section('contenido')


    @if (Auth::user()->hasRole('Asesor'))
        @livewire('motocicletas.index-motocicletas', ['number' => 1])
    @else
        @livewire('motocicletas.index-motocicletas')
    @endif

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>
        // $(document).ready(function() {
        //     $('#motocicletas').DataTable();
        // });

        // $(document).ready(function() {
        //     $('#productos').DataTable();
        // });

        Livewire.on('alert', ($message) => {
            Swal.fire(
                'Buen trabajo!',
                $message,
                'success'
            )
        })

        Livewire.on('alert-limit', ($message) => {
            Swal.fire(
                '¡Operacion Fallida!',
                $message,
                'warning'
            )
        })

    </script>
@endsection
