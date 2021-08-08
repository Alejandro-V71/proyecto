@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Repeusto</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                        @livewire('repuestos')

                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('RepuestoStore', () => {
            $('#registroRepuesto').modal('hide');
            $('#updateModal').modal('hide');

        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
