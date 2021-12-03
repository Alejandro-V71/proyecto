<div>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Editar Datos
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <label for="motocicleta.placaMotocicleta" class="col-sm-4 col-form-label">Placa</label>
                <div class="col-sm-7">
                    <input wire:model="motocicleta.placaMotocicleta" type="text" class="form-control"
                        name="motocicleta.placaMotocicleta" placeholder="Ingrese la Placa"
                        value="{{ old('motocicleta.placaMotocicleta') }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.placaMotocicleta'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.placaMotocicleta">{{ $errors->first('motocicleta.placaMotocicleta') }}</small>
                    @endif
                </div>
            </div>

            {{-- <div class="row">
                <label for="motocicleta.modelo" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-7">
                    <input wire:model="motocicleta.modelo" type="number" class="form-control"
                        name="motocicleta.modelo" placeholder="Ingrese el modelo (año)"
                        value="{{ old('motocicleta.modelo') }}" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.modelo'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.modelo">{{ $errors->first('motocicleta.modelo') }}</small>
                    @endif
                </div>
            </div> --}}

            <div class="row">
                <label for="motocicleta.colorMotocicleta" class="col-sm-4 col-form-label">Color</label>
                <div class="col-sm-7">
                    <input wire:model="motocicleta.colorMotocicleta" type="text" class="form-control"
                        name="motocicleta.colorMotocicleta" placeholder="Ingrese el Color"
                        value="{{ old('motocicleta.colorMotocicleta') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.colorMotocicleta'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.colorMotocicleta">{{ $errors->first('motocicleta.colorMotocicleta') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="motocicleta.marca_id" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-7">
                    <select wire:model="motocicleta.marca_id" class="form-control selectpicker"
                        data-style="btn btn-link" name="motocicleta.marca_id" id="motocicleta.marca_id">
                        <option value="" disabled>Seleccione una
                            Marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                {{ $marca->nombreMarca }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.marca_id'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.marca_id">{{ $errors->first('motocicleta.marca_id') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="motocicleta.categoria_id" class="col-sm-4 col-form-label">Categoria</label>
                <div class="col-sm-7">
                    <select wire:model="motocicleta.categoria_id" class="form-control selectpicker"
                        data-style="btn btn-link" name="motocicleta.categoria_id" id="motocicleta.categoria_id">
                        <option value="" disabled>Seleccione
                            una Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nombreCategoria }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.categoria_id'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.categoria_id">{{ $errors->first('motocicleta.categoria_id') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="motocicleta.linea_id" class="col-sm-4 col-form-label">Linea</label>
                <div class="col-sm-7">
                    <select wire:model="motocicleta.linea_id" class="form-control selectpicker"
                        data-style="btn btn-link" name="motocicleta.linea_id" id="motocicleta.linea_id">
                        <option value="" disabled>Seleccione
                            una Linea</option>
                        @foreach ($lineas as $linea)
                            <option value="{{ $linea->id }}">
                                {{ $linea->nombreLinea }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.linea_id'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.linea_id">{{ $errors->first('motocicleta.linea_id') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="motocicleta.cilindraje" class="col-sm-4 col-form-label">Cilindraje</label>
                <div class="col-sm-7">
                    <input wire:model="motocicleta.cilindraje" type="number" class="form-control"
                        name="motocicleta.cilindraje"
                        value="{{ $linea_seleccionada == null ? '' : $linea_seleccionada->cilindraje }}"
                        placeholder="{{ $linea_seleccionada == null ? '      ------------- cc' : '   ' . $linea_seleccionada->cilindraje . 'CC' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.cilindraje'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.cilindraje">{{ $errors->first('motocicleta.cilindraje') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="motocicleta.kilometraje" class="col-sm-4 col-form-label">kilometraje</label>
                <div class="col-sm-7">
                    <input wire:model="motocicleta.kilometraje" type="number" class="form-control"
                        name="motocicleta.kilometraje" value="{{ old('motocicleta.kilometraje') }}"
                        placeholder="Ingrese el motocicleta.kilometraje">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('motocicleta.kilometraje'))
                        <small class="error text-danger ml-3"
                            for="motocicleta.kilometraje">{{ $errors->first('motocicleta.kilometraje') }}</small>
                    @endif
                </div>
            </div>

            @if (Auth::user()->hasRole('Asesor'))
                <div class="row">
                    <label for="motocicleta.user_id" class="col-sm-4 col-form-label">Usuario</label>
                    <div class="col-sm-7">
                        <select wire:model="motocicleta.user_id" class="form-control selectpicker"
                            data-style="btn btn-link" name="motocicleta.user_id" id="motocicleta.user_id">
                            <option value="" selected>
                                Seleccione un Usuario
                            </option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div style="min-height: 25px">
                        @if ($errors->has('motocicleta.user_id'))
                            <small class="error text-danger ml-3"
                                for="motocicleta.user_id">{{ $errors->first('motocicleta.user_id') }}</small>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <div class="modal-footer d-flex justify-content-around">

            <div class="p-3 text-white">
                <button type="button" wire:click="clean" wire:loading.attr="disabled" wire:target="clean"
                    class="btn btn-secondary disabled:opacity-25" data-dismiss="modal">Cancelar</button>
            </div>

            <div class="p-3 text-white">
                <button type="button" wire:click="update" wire:loading.attr="disabled" wire:target="update"
                    class="btn btn-primary disabled:opacity-25">Actualizar</button>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            Livewire.on('close', () => {
                $('#exampleModal').modal('hide');
            })

            Livewire.on('close2', () => {
                $('#editMotocicleta').modal('hide');
            })
        </script>
    @endpush
</div>
