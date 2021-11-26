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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                            </div>
                        <select wire:model="user_id" class="form-control  @error('user_id') is-invalid @enderror" readonly>
                            <option value="">Usuarios</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        @error('user_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Título</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-marker"></i></span>
                            </div>
                        <input type="text" class="form-control" wire:model="title">
                    </div>
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Comienzo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-play-circle"></i></span>
                            </div>
                        <input type="date" class="form-control" wire:model="Start" readonly>
                    </div>
                        @error('Start') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Fin</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="far fa-stop-circle"></i></span>
                            </div>
                        <input type="date" class="form-control" wire:model="End">
                    </div>
                        @error('End') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <input type="hidden" wire:model="id_solicitud">
                        <label for="exampleFormControlInput1">Hora</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="far fa-clock"></i></span>
                            </div>
                        <input type="time" class="form-control" wire:model="horaSolcitudServicio">
                    </div>
                        @error('horaSolcitudServicio') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Descripción del problema</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="far fa-file-alt"></i></span>
                            </div>
                        <input type="text" class="form-control" wire:model="descripcionProblema">
                    </div>
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
