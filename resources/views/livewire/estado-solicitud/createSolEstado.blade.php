<div>

    <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#crearEstado" >
        Nuevo
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="crearEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lightbulb"></i></span>
                                </div>
                            <select wire:model="solicitud_id" class="form-control  @error('solicitud_id') is-invalid @enderror">
                                <option value="">Solicitud</option>
                                @foreach ($solicitudes as $solicitud)
                                <option value="{{$solicitud->id}}">{{$solicitud->descripcionProblema}}</option>
                                @endforeach
                            </select>
                            </div>
                            @error('solicitud_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div>
                            <label>Estados</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-power-off"></i></span>
                                </div>
                            <select wire:model="estado_id" class="form-control  @error('estado_id') is-invalid @enderror">
                                <option value="">Estados</option>
                                @foreach ($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->tipoEstado}}</option>
                                @endforeach
                            </select>
                        </div>
                            @error('estado_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="fechaIncio">Fecha inicio</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-play-circle"></i></span>
                                </div>
                            <input type="date"  id="fechaIncio" class="form-control  @error('fechaIncio') is-invalid @enderror" placeholder="Fecha inicio" wire:model="fechaIncio">
                        </div>
                            @error('fechaIncio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="fechaFin">Fecha fin</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="far fa-stop-circle"></i></span>
                                </div>
                            <input type="date" id="fechaFin" class="form-control  @error('fechaFin') is-invalid @enderror" wire:model="fechaFin" placeholder="Fecha fin">
                        </div>
                            @error('fechaFin')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="submit" wire:click.prevent="save()"class="btn btn-primary" wire:click.prevent="store()" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    </div>

