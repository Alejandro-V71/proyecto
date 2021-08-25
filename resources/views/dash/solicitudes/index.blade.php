@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Solicitud de servicios</h1>
    @livewireStyles()
@stop

@section('content')
@livewire('solicitudes.solicitud-servicios')

@livewireScripts
<script type="text/javascript">
    window.livewire.on('userGuardar', () => {
        $('#exampleModal').modal('hide');
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
