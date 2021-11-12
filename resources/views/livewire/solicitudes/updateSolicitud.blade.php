<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar solicitudes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div>
                        <label>Usuario</label>
                        <select wire:model="user_id" class="form-control  @error('user_id') is-invalid @enderror">
                            <option value="">Usuarios</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Título</label>
                        <input type="text" class="form-control" wire:model="title">
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Comienzo</label>
                        <input type="date" class="form-control" wire:model="Start">
                        @error('Start') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Fin</label>
                        <input type="date" class="form-control" wire:model="End">
                        @error('End') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="id_solicitud">
                        <label for="exampleFormControlInput1">Hora</label>
                        <input type="time" class="form-control" wire:model="horaSolcitudServicio">
                        @error('horaSolcitudServicio') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Descripción del problema</label>
                        <input type="text" class="form-control" wire:model="descripcionProblema">
                        @error('descripcionProblema')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-success" data-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>
