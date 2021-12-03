<div>
    @if (Auth::user()->hasRole('Tecnico'))
    @include('livewire.detalle-solicitud.detalleModal')
    @include('livewire.detalle-solicitud.detalle')
    @else
    @include('livewire.detalle-solicitud.detalle')
    @include('livewire.detalle-solicitud.detalleModal')

    <div class="container" id="table">
        @include('livewire.solicitudes.updateSolicitud')

        <div class="row mt-6">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                <div class="card-header border-0">
                    <div class="float-left mr-2  mb-2 w-100" >
                        @include('livewire.solicitudes.createSolicitud')
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearSolicitud" >
                        Nuevo
                    </button>
                  <h3 class="mb-0 mt-3">Solicitud de servicio</h3>
                </div>

                    <!-- Light table -->
                <div class="table-responsive">

                    <table class="table align-items-center table-flush" id="SolicitudServicio">
                      <thead class="thead-light">
                          <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="name">Usuario</th>
                                <th scope="col" class="sort" data-sort="name">Títuto</th>
                                <th scope="col" class="sort" data-sort="name">Comienzo</th>
                                <th scope="col" class="sort" data-sort="name">Fin</th>
                                <th scope="col" class="sort" data-sort="name">Hora solicitud de servicio</th>
                                <th scope="col" class="sort" data-sort="name">Descripción problema</th>
                                <th scope="col" class="sort" data-sort="name">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($solicitudes as $value)
                        <tr>
                            <td class="budget">{{$value->id}}</td>
                            <td class="budget">{{$value->user->name}}</td>
                            <td class="budget">{{$value->title}}</td>
                            <td class="budget">{{$value->Start}}</td>
                            <td class="budget">{{$value->End}}</td>
                            <td class="budget">{{$value->horaSolcitudServicio}}</td>
                            <td class="budget">{{$value->descripcionProblema}}</td>
                            <td  class="budget">

                                @if (Auth::user()->hasRole('Cliente'))
                                <button type="submit" wire:click="Detalle({{ $value->id }})" data-toggle="modal" data-target="#detalleModal" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></button>
                                @else
                                <button type="submit" wire:click="editar({{ $value->id }})"  data-toggle="modal" data-target="#updateModal" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                <button type="submit" wire:click="$emit('deleteSolicitud', {{ $value->id }})" class="btn btn-danger btn-sm" id="eliminar" ><i class="far fa-trash-alt"></i></button>
                                @endif




                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Card footer -->
        <div>
    @endif



      <!--{$users->links()}}-->
    </div>

  </div>
  </div>
  </div>
    </div>
  </div>
