@extends('layouts.dash')

@section('contenido')
    <div>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Motocicletas</li>
            </ol>
        </nav>
    </div>
    <br>

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
