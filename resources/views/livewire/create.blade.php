<div>
<button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#registroRepuesto">
	Nuevo
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="registroRepuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo repuesto</h5>
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
                        <input type="text" class="form-control   @error('nombreRepuestos') is-invalid @enderror"  placeholder="Nombre del repuesto" id="nombreRepuestos" wire:model="nombreRepuestos">
                        @error('nombreRepuestos') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror

                    </div>


                    <div class="form-group">
                        <label>Descripción</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="far fa-file-alt"></i></span>
                            </div>
                       <textarea   id="descripcionRepuestos" name="descripcionRepuestos" class="form-control   @error('descripcionRepuestos') is-invalid @enderror" placeholder="Descripción del repuesto" wire:model="descripcionRepuestos"></textarea>
                       @error('descripcionRepuestos') <span class="invalid-feedback " role="alert">{{ $message }}</span> @enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search-dollar"></i></span>
                            </div>
                        <input type="number" class="form-control  @error('precioRepuestos') is-invalid @enderror" id="precioRepuestos" placeholder="Precio del repuesto"  wire:model="precioRepuestos">
                        @error('precioRepuestos') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror

                    </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click="store()"  class="btn btn-primary close-modal">Registrar</button>


            </div>

        </div>

    </div>
    <div>

    </div>
</div>

</div>

