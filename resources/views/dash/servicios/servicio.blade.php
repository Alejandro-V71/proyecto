@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')
@livewire('servicios.servicios')
@livewireStyles()
@livewireScripts

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
