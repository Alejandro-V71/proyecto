<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="storeDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear detalles de solicitud</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="diagnostico">Diagnostico</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                </div>
                            <input type="text"  id="diagnostico" class="form-control  @error('diagnostico') is-invalid @enderror" placeholder="Diagnostico de la solicitud de servicio" wire:model="diagnostico">
                        </div>
                            @error('diagnostico')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div>
                            <label>Solicitud</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lightbulb"></i></span>
                                </div>
                            <select wire:model="solicitud_servicio_id" class="form-control @error('solicitud_servicio_id') is-invalid @enderror">
                                <option value="">Solicitud</option>
                                @foreach ($solicitudes as $solicitud)
                                <option value="{{$solicitud->id}}">{{$solicitud->title}}</option>
                                @endforeach
                            </select>
                            </div>
                            @error('solicitud_servicio_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div>
                            <label>Servicio</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-tools"></i></span>
                                </div>
                            <select wire:model="servicio_id" class="form-control  @error('servicio_id') is-invalid @enderror">
                                <option value="">Servicio</option>
                                @foreach ($servicios as $servicio)
                                <option value="{{$servicio->id}}">{{$servicio->nombreServicio}}</option>
                                @endforeach
                            </select>
                        </div>
                            @error('servicio_id')<span class="invalid-freedback"> {{$message}} </span> @enderror
                        </div>

                        <div>
                            <label>Repuestos</label>
                            {{-- <select wire:model="idRepuesto" multiple class="form-control  @error('') is-invalid @enderror">
                                <option value="">Repuestos</option>
                                @foreach ($repuestos as $value)
                                <option value="{{$value->id}}">{{$value->nombreRepuesto}}</option>
                                @endforeach
                            </select> --}}


                                @foreach ($repuestos as $value)
                                <div class="form-check">
                                <input class="form-check-input @error('') is-invalid @enderror" wire:model="idRepuesto" type="checkbox"    value="{{$value->id}}" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{$value->nombreRepuesto}}
                                </label>
                            </div>
                                @endforeach

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                    <button type="submit" wire:click.prevent="$emit('guardarD')" class="btn btn-primary close-modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
