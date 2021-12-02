@extends('layouts.dash')



@section('contenido')
  





                     @livewire('reporte-cuenta-controller')




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
