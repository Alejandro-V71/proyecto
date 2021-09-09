@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuario</h1>
@stop

@section('content')
@livewire('users.users')
@livewireStyles()
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
