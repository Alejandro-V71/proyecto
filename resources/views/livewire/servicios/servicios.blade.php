
<div>

    @include('livewire.servicios.updateServicio')
    <div class="row mt-6" >
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <div class="float-left mr-2  mb-2 w-100" >
                    <input type="text" class="form-control" placeholder="Buscar" wire:model="search">
                </div>
                @include('livewire.servicios.createServicios')
              <h3 class="mb-0">Servicios</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                          <tr>
                        <th scope="col" class="sort" data-sort="name">#</th>
                        <th scope="col" class="sort" data-sort="name">Estado</th>
                        <th scope="col" class="sort" data-sort="name">Nombre de servicio</th>
                        <th scope="col" class="sort" data-sort="name">Precio total</th>
                        <th scope="col" class="sort" data-sort="name">Tipo de servicio</th>
                        <th scope="col" class="sort" data-sort="name">Acciones</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td class="budget">{{$servicio->id}}</td>
                    <td class="budget">{{$servicio->estadoServicio}}</td>
                    <td class="budget">{{$servicio->nombreServicio}}</td>
                    <td class="budget">{{$servicio->precioTotal}}</td>
                    <td class="budget">{{$servicio->tipoServicio->nombreTipoServicio}}</td>
                    <td class="budget">
                        <button type="submit" wire:click="editarr({{ $servicio->id }})" data-toggle="modal" data-target="#updateModal" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="submit" wire:click="deleteSer({{ $servicio->id }})" class="btn btn-danger btn-sm" id="eliminar" ><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
</div>
