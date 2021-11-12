<div>

    <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModal" >
        Nuevo
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear solicitud de estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form>
                        <div>
                            <label>Solicitud</label>
                            <select wire:model="solicitud_id" class="form-control  @error('solicitud_id') is-invalid @enderror">
                                <option value="">Solicitud</option>
                                @foreach ($solicitudes as $solicitud)
                                <option value="{{$solicitud->id}}">{{$solicitud->descripcionProblema}}</option>
                                @endforeach
                            </select>
                            @error('solicitud_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div>
                            <label>Estados</label>
                            <select wire:model="estado_id" class="form-control  @error('estado_id') is-invalid @enderror">
                                <option value="">Estados</option>
                                @foreach ($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->tipoEstado}}</option>
                                @endforeach
                            </select>
                            @error('estado_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="fechaIncio">Fecha inicio</label>
                            <input type="date"  id="fechaIncio" class="form-control  @error('fechaIncio') is-invalid @enderror" placeholder="Fecha inicio" wire:model="fechaIncio">
                            @error('fechaIncio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="fechaFin">Fecha fin</label>
                            <input type="date" id="fechaFin" class="form-control  @error('fechaFin') is-invalid @enderror" wire:model="fechaFin" placeholder="Fecha fin">
                            @error('fechaFin')<span class="invalid-freedback"> {{$message}} </span> @enderror
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

