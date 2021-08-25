<div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
        Nuevo
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear detalles de solicitud</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="diagnostico">Diagnostico</label>
                            <input type="text"  id="diagnostico" class="form-control  @error('diagnostico') is-invalid @enderror" placeholder="Diagnostico" wire:model="diagnostico">
                            @error('diagnostico')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div>
                            <label>Solicitud</label>
                            <select wire:model="solicitud_servicio_id" class="form-control  @error('solicitud_servicio_id') is-invalid @enderror">
                                <option value="">Solicitud</option>
                                @foreach ($solicitudes as $solicitud)
                                <option value="{{$solicitud->id}}">{{$solicitud->descripcionProblema}}</option>
                                @endforeach
                            </select>
                            @error('solicitud_servicio_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div>
                            <label>Servicio</label>
                            <select wire:model="servicio_id" class="form-control  @error('servicio_id') is-invalid @enderror">
                                <option value="">Servicio</option>
                                @foreach ($servicios as $servicio)
                                <option value="{{$servicio->id}}">{{$servicio->nombreServicio}}</option>
                                @endforeach
                            </select>
                            @error('servicio_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
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

