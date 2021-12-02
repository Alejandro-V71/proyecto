<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="crearSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                                </div>
                            <select wire:model="user_id" class="form-control  @error('user_id') is-invalid @enderror">
                                <option value="">Usuarios</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                            @error('user_id')<span class="invalid-freedback"> {{$message}} </span> @enderror

                        </div>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-marker"></i></span>
                                </div>
                            <input type="text" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Título de la solicitud de servicio" wire:model="title">
                        </div>
                            @error('title')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Star">Comienzo</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-play-circle"></i></span>
                                </div>
                            <input type="date" id="Start" class="form-control  @error('Start') is-invalid @enderror" placeholder="Comienzo" wire:model="Start">
                        </div>
                            @error('Start')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="End">Fin</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="far fa-stop-circle"></i></span>
                                </div>
                            <input type="date" id="End" class="form-control  @error('End') is-invalid @enderror" placeholder="Fin" wire:model="End">
                        </div>
                            @error('End')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="hora">Hora</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="far fa-clock"></i></span>
                                </div>
                            <input type="time" id="hora" class="form-control  @error('horaSolcitudServicio') is-invalid @enderror" placeholder="Hora" wire:model="horaSolcitudServicio">
                        </div>
                            @error('horaSolcitudServicio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción del problema</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="far fa-file-alt"></i></span>
                                </div>
                            <input type="textarea" id="descripcion" class="form-control  @error('descripcionProblema') is-invalid @enderror" wire:model="descripcionProblema" placeholder="Descripción del problema">
                        </div>
                            @error('descripcionProblema')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="submit" wire:click.prevent="save()" wire:click.prevent="storeSolicitud()" class="btn btn-primary" wire:loading.attr="disabled" data-dismiss="modal">Guardar</button>
                </div>

            </div>
        </div>
    </div>
    </div>
