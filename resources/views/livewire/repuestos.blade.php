<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif


    @include('livewire.update')

    <div class="row mt-6" >
        <div class="col">
          <div class="card">

            <!-- Card header -->
            <div class="card-header border-0">
                @include('livewire.create')
              <h3 class="mb-0">Repuestos</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="Repuestos">
                <thead class="thead-light">
          <tr>
            <th scope="col" class="sort" data-sort="name">#</th>
            <th scope="col" class="sort" data-sort="name">Nombre</th>
            <th scope="col" class="sort" data-sort="name">Descripción</th>
            <th scope="col" class="sort" data-sort="name">Precio</th>
            <th scope="col" class="sort" data-sort="name">Acciones</th>

          </tr>
        </thead>
        <tbody>
          @foreach ( $repuestos as $repuesto )
          <tr>
            <th class="budget">{{$repuesto->id}}</th>
            <td class="budget">{{$repuesto->nombreRepuesto}}</td>
            <td class="budget">{{$repuesto->descripcionRepuesto}}</td>
            <td class="budget">{{$repuesto->precioRepuesto}}</td>
            <td class="budget">
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $repuesto->id }})" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>

                <button wire:click="$emit('deleteRepuesto', {{ $repuesto->id }})" class="btn btn-danger btn-sm" id="eliminar" ><i class="far fa-trash-alt"></i></button>

                </td>
          </tr>
          @endforeach

        </tbody>
    </table>
  </div>
  <!-- Card footer -->
  <div>
  </div>

</div>
</div>
</div>





</div>
