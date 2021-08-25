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
                        <input type="date" class="form-control  @error('fechaIncio') is-invalid @enderror" id="fechaIncio" placeholder="Fecha inicio" wire:model="fechaIncio">
                        @error('fechaIncio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">Fecha fin</label>
                        <input type="date" class="form-control  @error('fechaFin') is-invalid @enderror" id="fechaFin" wire:model="fechaFin" placeholder="Fecha fin">
                        @error('fechaFin')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>
