<div>

    @include('livewire.users.update')

    <div class="row mt-6" >


        <div class="col">
          <div class="card">

            <!-- Card header -->
            <div class="card-header border-0">
                <div class="float-left mr-2  mb-2 w-100" >
                    <input type="text" class="form-control" placeholder="Buscar" wire:model="search">

                </div>
                @include('livewire.users.create')

              <h3 class="mb-0 mt-3">Usuarios</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
          <tr>
            <th scope="col" class="sort" data-sort="name">#</th>
            <th scope="col" class="sort" data-sort="name">Nombre</th>
            <th scope="col" class="sort" data-sort="name">Correo</th>
            <th scope="col" class="sort" data-sort="name">Estado</th>
            <th scope="col" class="sort" data-sort="name">Rol</th>
            <th scope="col" class="sort" data-sort="name">Acciones</th>

          </tr>
        </thead>
        <tbody>
          @foreach ( $users as $user )
          <tr>
            <th class="budget">{{$user->id}}</th>
            <td class="budget">{{$user->name}}</td>
            <td class="budget">{{$user->email}}</td>
            <td class="budget">

                @switch($user->Estado)
                    @case(null)
                    <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">
                            <span class="status" wire:click="$emit('estado',{{$user->id}})">Sin estado</span>
                        </span>
                    </span>
                    @break
                    @case(1)
                    <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status" wire:click="$emit('estado',{{$user->id}})">Activo</span>
                      </span>
                    @break
                    @case(2)
                    <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i>
                        <span class="status" wire:click="$emit('estado',{{$user->id}})"> Inactivo</span>
                    </span>
                    @break

                    @default

                @endswitch

            </td>

            <td class="budget">
             {{$user->getRoleNames()}}
            </td>
            <td class="budget">
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $user->id }})" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>

                </td>
          </tr>
          @endforeach

        </tbody>
    </table>

  </div>
  <!-- Card footer -->
  <div>
    {{$users->links()}}
  </div>

</div>
</div>
</div>

</div>



