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
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email"  id="email" wire:model="email" placeholder="Correo electrónico">

                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email-confirm">Confirmar Correo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email"   name="email_confirmation" class="form-control  @error('email_confirmation') is-invalid @enderror" id="email-confirm"  placeholder="Confirmar correo" >

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email-confirm">Nombre de usuario</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text"   name="name" class="form-control  @error('name') is-invalid @enderror" id="name"  placeholder="Nombre" wire:model="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role_user">Rol</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
                            </div>
                        <select wire:model="rol" class="form-control" id="">
                        @foreach ($roles as $id => $role )
                        <option value="{{$id}}">{{$role}}</option>
                        @endforeach
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-power-off"></i></span>
                            </div>
                        <select wire:model="estado" name="estado" class="form-control" id="">
                        <option value="0" selected>Sin estado<option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                    </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button"  id="cancelar"class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="enviar"    wire:click.prevent="store" wire:loading.attr="disabled"  class="btn btn-primary close-modal" wire:key="store">
                        Guardar</button>

                </div>






            </div>

        </div>
    </div>
</div>
</div>
