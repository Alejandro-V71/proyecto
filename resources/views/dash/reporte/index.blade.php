@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Repeusto</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>





                     <a href="{{ url('dash/tecnico/reporte/estado/dsafjasdfkadskfjasdñfjasñfjasñlkf')}}" > Imprimir</a>
                     @livewire('reporte-estado-controller')


        

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
