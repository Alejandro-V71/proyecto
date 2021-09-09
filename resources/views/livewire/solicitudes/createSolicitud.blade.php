<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
        Nuevo
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear solicitud de servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
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
                            <label for="title">Título</label>
                            <input type="text" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Título" wire:model="title">
                            @error('title')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Star">Comienzo</label>
                            <input type="date" id="Start" class="form-control  @error('Start') is-invalid @enderror" placeholder="Comienzo" wire:model="Start">
                            @error('Start')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="End">Fin</label>
                            <input type="date" id="End" class="form-control  @error('End') is-invalid @enderror" placeholder="Fin" wire:model="End">
                            @error('End')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora</label>
                            <input type="time" id="hora" class="form-control  @error('horaSolcitudServicio') is-invalid @enderror" placeholder="Hora" wire:model="horaSolcitudServicio">
                            @error('horaSolcitudServicio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" id="fecha" class="form-control  @error('fechaSolicitudServicio') is-invalid @enderror" wire:model="fechaSolicitudServicio" placeholder="fecha">
                            @error('fechaSolicitudServicio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción del problema</label>
                            <input type="textarea" id="descripcion" class="form-control  @error('descripcionProblema') is-invalid @enderror" wire:model="descripcionProblema" placeholder="Descripcion">
                            @error('descripcionProblema')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="submit" wire:click.prevent="save()" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
                </div>

            </div>
        </div>
    </div>
    </div>
