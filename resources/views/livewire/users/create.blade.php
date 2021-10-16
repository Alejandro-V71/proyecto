<div>
<button type="button" wire:click="$emit('warningUser')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
	Nuevo
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email"  class="form-control  @error('email') is-invalid @enderror" id="email" wire:model="email" placeholder="Correo">
                        @error('email')<span class="invalid-freedback"> {{$message}} </span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="role_user">Rol</label>
                        <select wire:model="rol" class="form-control" id="">

                        @foreach ($roles as $id => $role )
                        <option value="{{$id}}">{{$role}}</option>

                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select wire:model="estado" name="estado" class="form-control" id="">


                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>


                    </select>


                    </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>

                <button type="submit"  wire:click="store()"class="btn btn-primary close-modal">Guardar</button>
                



            </div>

        </div>
    </div>
</div>
</div>
