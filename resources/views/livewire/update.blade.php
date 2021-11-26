<div>
    <!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar repuesto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nombre repuesto</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-cog"></i></span>
                            </div>
                        <input type="text" class="form-control   @error('nombreRepuestos') is-invalid @enderror"  placeholder="ingrese Nombre" id="nombreRepuestos" wire:model="nombreRepuestos">
                    </div>
                        @error('nombreRepuestos') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="far fa-file-alt"></i></span>
                            </div>
                       <textarea   id="descripcionRepuestos" class="form-control   @error('descripcionRepuestos') is-invalid @enderror" wire:model="descripcionRepuestos"></textarea>
                    </div>
                       @error('descripcionRepuestos') <span class="invalid-feedback ">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search-dollar"></i></span>
                            </div>
                        <input type="number" class="form-control  @error('precioRepuestos') is-invalid @enderror" id="precioRepuestos"  wire:model="precioRepuestos">
                    </div>
                        @error('precioRepuestos') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  wire:click.prevent="cancel()" class="btn btn-secondary close-btn" data-dismiss="modal" >Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-success close-modal">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
</div>
