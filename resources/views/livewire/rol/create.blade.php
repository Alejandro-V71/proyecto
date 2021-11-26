<div>
    <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#registroRepuesto">
        Nuevo
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="registroRepuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nombre</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                                </div>
                            <input type="text" class="form-control   @error('nombreRepuestos') is-invalid @enderror"  placeholder="Ingrese nombre" id="nombreRepuestos" wire:model="nombreRepuestos">
                            @error('nombreRepuestos') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                       <div>
                           @foreach ($permisos as $permiso )
                                    <input type="checkbox" name="" id="">{{$permiso->name}} <br>
                           @endforeach

                       </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
