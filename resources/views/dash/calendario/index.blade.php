@extends('layouts.dash')

@section('contenido')

<div class="card mt-5">
    <div class="container">
        <div id="agenda" class="mt-3">

        </div>
    </div>
</div>


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Solicitud Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form action="" id="form">
                    {!!  csrf_field() !!}
                    <div class="form-group">

                        <label>ID</label>
                        <input type="text" id="id" name="id"  class="form-control" disabled>

                    </div>
                    <div class="form-group">

                        <label>Titulo</label>
                        <input type="text" id="title" name="title"  class="form-control" >

                    </div>
                    <div class="form-group">

                        <label>Hora de Solicitud</label>
                        <input type="time" id="horaSolcitudServicio" name="horaSolcitudServicio"  class="form-control" >

                    </div>
                    <div class="form-group">
                        <label>Fecha de creación</label>
                        <input type="text" id="start" name="start"  class="form-control" >

                    </div>
                    <div class="form-group">
                        <label>fecha De Solicitud</label>
                     <input type="text" id="end" name="end" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>Descripción del Problema</label>
                       <textarea  id="descripcionProblema"  class="form-control"   name="descripcionProblema" cols="30" rows="10" ></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button"  id="btnGuardar" class="btn btn-primary close-modal">Registrar</button>
            </div>
        </div>
    </div>
</div>
<script>
  var site_url = "{{ url('/') }}";
</script>


@stop





    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript"src="{{ asset('js/agenda.js') }}" defer></script>
