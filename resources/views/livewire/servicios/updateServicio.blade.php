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
                    <div class="form-group">
                        <label for="estadoServicio">Estado de servicio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-power-off"></i></span>
                            </div>
                        <input type="text"  id="estadoServicio" class="form-control  @error('estadoServicio') is-invalid @enderror" placeholder="estadoServicio" wire:model="estadoServicio">
                    </div>
                        @error('estadoServicio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombreServicio">Nombre servicio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-signature"></i></span>
                            </div>
                        <input type="text"  id="nombreServicio" class="form-control  @error('nombreServicio') is-invalid @enderror" placeholder="nombreServicio" wire:model="nombreServicio">
                    </div>
                        @error('nombreServicio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="precioTotal">Precio total</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-donate"></i></span>
                            </div>
                        <input type="number"  id="precioTotal" class="form-control  @error('precioTotal') is-invalid @enderror" placeholder="precioTotal" wire:model="precioTotal">
                    </div>
                        @error('precioTotal')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Tipo de servicio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-tools"></i></span>
                            </div>
                        <select wire:model="tipo_de_servicio_id" class="form-control  @error('tipo_de_servicio_id') is-invalid @enderror">
                            <option value="">Servicio</option>
                            @foreach ($tiServicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->nombreTipoServicio}}</option>
                            @endforeach
                        </select>
                    </div>
                        @error('tipo_de_servicio_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="$emit('actualizarServicio')" class="btn btn-success" data-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>
