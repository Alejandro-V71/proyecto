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
                        <label for="estadoServicio">Estado</label>
                        <input type="text"  id="estadoServicio" class="form-control  @error('estadoServicio') is-invalid @enderror" placeholder="estadoServicio" wire:model="estadoServicio">
                        @error('estadoServicio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombreServicio">nombreServicio</label>
                        <input type="text"  id="nombreServicio" class="form-control  @error('nombreServicio') is-invalid @enderror" placeholder="nombreServicio" wire:model="nombreServicio">
                        @error('nombreServicio')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="precioTotal">precioTotal</label>
                        <input type="number"  id="precioTotal" class="form-control  @error('precioTotal') is-invalid @enderror" placeholder="precioTotal" wire:model="precioTotal">
                        @error('precioTotal')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                    <div>
                        <label>Tipo de servicio</label>
                        <select wire:model="tipo_de_servicio_id" class="form-control  @error('tipo_de_servicio_id') is-invalid @enderror">
                            <option value="">Servicio</option>
                            @foreach ($tiServicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->nombreTipoServicio}}</option>
                            @endforeach
                        </select>
                        @error('tipo_de_servicio_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="updatee()" class="btn btn-success" data-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>
