<div>
<button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#registroRepuesto">
	Nuevo
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="registroRepuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Repuestos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombreRepuestos" @error('nombreRepuestos') is-invalid @enderror"  placeholder="ingrese Nombre" id="nombreRepuestos" wire:model="nombreRepuestos">
                        @error('nombreRepuestos') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                       <textarea   id="descripcionRepuestos" class="form-control   @error('descripcionRepuestos') is-invalid @enderror" wire:model="descripcionRepuestos"></textarea>
                       @error('descripcionRepuestos') <span class="invalid-feedback ">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" class="form-control  @error('precioRepuestos') is-invalid @enderror" id="precioRepuestos"  wire:model="precioRepuestos">
                        @error('precioRepuestos') <span class="invalid-feedback">{{ $message }}</span> @enderror
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

