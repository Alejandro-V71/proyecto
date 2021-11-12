<div>
    @include('livewire.estado-solicitud.updateSolEstado')
    <div class="row mt-6" >


        <div class="col">
          <div class="card">

            <!-- Card header -->
            <div class="card-header border-0">
                <div class="float-left mr-2  mb-2 w-100" >
                    <input type="text" class="form-control" placeholder="Buscar" wire:model="search">

                </div>
                @include('livewire.estado-solicitud.createSolEstado')
                <h3 class="mb-0 mt-3">Estado de solicitudes</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead  class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">#</th>
                            <th scope="col" class="sort" data-sort="name">Solicitud</th>
                            <th scope="col" class="sort" data-sort="name">Estado</th>
                            <th scope="col" class="sort" data-sort="name">Fecha inicio</th>
                            <th scope="col" class="sort" data-sort="name">Fecha Fin</th>
                            <th scope="col" class="sort" data-sort="name">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($solEstados as $value)
                    <tr>
                        <td class="budget">{{$value->id}}</td>
                        <td class="budget">{{$value->SolicitudServicio->descripcionProblema}}</td>
                        <td class="budget">{{$value->Estado->tipoEstado}}</td>
                        <td class="budget">{{$value->fechaIncio}}</td>
                        <td class="budget">{{$value->fechaFin}}</td>
                        <td class="budget">
                            <button type="submit" wire:click="editar({{ $value->id }})" data-toggle="modal" data-target="#updateModal" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                            <button type="submit" wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm" id="eliminar" ><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
