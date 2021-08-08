<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="float-left mr-2  mb-2 w-100" >
        <input type="text" class="form-control" placeholder="Buscar" wire:model="search">
    </div>
    @include('livewire.create')
    @include('livewire.update')

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>

          </tr>
        </thead>
        <tbody>
          @foreach ( $repuestos as $repuesto )
          <tr>
            <th scope="row">{{$repuesto->id}}</th>
            <td >{{$repuesto->nombreRepuesto}}</td>
            <td>{{$repuesto->descripcionRepuesto}}</td>
            <td>{{$repuesto->precioRepuesto}}</td>
            <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $repuesto->id }})" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>

                <button wire:click="delete({{ $repuesto->id }})" class="btn btn-danger btn-sm" id="eliminar" ><i class="far fa-trash-alt"></i></button>



                </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      {{ $repuestos->links() }}



</div>
