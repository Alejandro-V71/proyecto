<div id="mostrarDetalles">


    @if (Auth::user()->hasRole('Cliente') )
       

    @else
    @include('livewire.detalle-solicitud.updateDetalles')

    <div class="row mt-6" >
        <div class="col">
          <div class="card">

            <!-- Card header -->
            <div class="card-header border-0">
                <div class="float-left mr-2  mb-2 w-100" >
                    <div class="float-left mr-2  mb-2 w-100" >
                        @include('livewire.detalle-solicitud.createDetalles')
                    </div>
                </div>
                <button type="submit" wire:click="storeDetalle()" data-toggle="modal" data-target="#storeDetalle" class="btn btn-primary btn-sm">Nuevo</button>
              <h3 class="mb-0 mt-3">Detalle Solicitudes</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="DetalleSolicitud">
                <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">#</th>
                            <th scope="col" class="sort" data-sort="name">Diagnostico</th>
                            <th scope="col" class="sort" data-sort="name">Solicitud de servicio</th>
                            <th scope="col" class="sort" data-sort="name">Servicio</th>
                            <th scope="col" class="sort" data-sort="name">Repuesto</th>
                            <th scope="col" class="sort" data-sort="name">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($detalles as $value)
                    <tr>
                        <td class="budget">{{$value->id}}</td>
                        <td class="budget">{{$value->diagnostico}}</td>
                        <td class="budget">{{$value->solicitudServicio->title}}</td>
                        <td class="budget">{{$value->servicio->nombreServicio}}</td>
                        <td class="budget">{{$value->repuestos->pluck("nombreRepuesto")}}</td>
                        <td class="budget">
                            <button type="submit" wire:click="show({{ $value->id }})" data-toggle="modal" data-target="#updateDetalle" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                            <button type="submit" wire:click="$emit('deleteDetalle', {{ $value->id }})" class="btn btn-danger btn-sm" id="eliminar" ><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Card footer -->





  </div>
