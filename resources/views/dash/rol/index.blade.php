@extends('layouts.dash')

@section('contenido')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
      <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
      <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Roles</li>
    </ol>
  </nav>
    @livewire('rol.rol')
@endsection
{{-- @section('title', 'Dashboard')

@section('content_header')
    <h1>Rol</h1>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop --}}
