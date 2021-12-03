<div>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Registrar Datos
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <label for="placaMotocicleta" class="col-sm-4 col-form-label">Placa</label>
                <div class="col-sm-7">
                    <input wire:model="placaMotocicleta" type="text" class="form-control" name="placaMotocicleta"
                        placeholder="Ingrese la Placa" value="{{ old('placaMotocicleta') }}" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('placaMotocicleta'))
                        <small class="error text-danger ml-3"
                            for="placaMotocicleta">{{ $errors->first('placaMotocicleta') }}</small>
                    @endif
                </div>
            </div>


            {{-- <div class="row">
                <label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-7">
                    <input wire:model="modelo" type="number" class="form-control" name="modelo"
                        placeholder="Ingrese el modelo (año)" value="{{ old('modelo') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('modelo'))
                        <small class="error text-danger ml-3" for="modelo">{{ $errors->first('modelo') }}</small>
                    @endif
                </div>
            </div> --}}

            <div class="row">
                <label for="colorMotocicleta" class="col-sm-4 col-form-label">Color</label>
                <div class="col-sm-7">
                    <input wire:model="colorMotocicleta" type="text" class="form-control" name="colorMotocicleta"
                        placeholder="Ingrese el colorMotocicleta" value="{{ old('colorMotocicleta') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('colorMotocicleta'))
                        <small class="error text-danger ml-3"
                            for="colorMotocicleta">{{ $errors->first('colorMotocicleta') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="marca_id" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-7">
                    <select wire:model="marca_id" class="form-control" data-style="btn btn-link"
                        name="marca_id" id="marca_id">
                        <option value="" selected disabled>Seleccione una
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
                    @if ($errors->has('marca_id'))
                        <small class="error text-danger ml-3" for="marca_id">{{ $errors->first('marca_id') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="categoria_id" class="col-sm-4 col-form-label">Categoria</label>
                <div class="col-sm-7">
                    <select wire:model="categoria_id" class="form-control selectpicker" data-style="btn btn-link"
                        name="categoria_id" id="categoria_id">
                        <option value="" selected disabled>Seleccione
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
                    @if ($errors->has('categoria_id'))
                        <small class="error text-danger ml-3"
                            for="categoria_id">{{ $errors->first('categoria_id') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="linea_id" class="col-sm-4 col-form-label">Linea</label>
                <div class="col-sm-7">
                    <select wire:model="linea_id" class="form-control selectpicker" data-style="btn btn-link"
                        name="linea_id" id="linea_id">
                        <option value="" selected disabled>Seleccione
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
                    @if ($errors->has('linea_id'))
                        <small class="error text-danger ml-3" for="linea_id">{{ $errors->first('linea_id') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="cilindraje" class="col-sm-4 col-form-label">Cilindraje</label>
                <div class="col-sm-7">
                    <input wire:model="cilindraje" type="number" class="form-control" name="cilindraje"
                        value="{{ old('cilindraje') }}"
                        placeholder="Ingrese el Cilindraje">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('cilindraje'))
                        <small class="error text-danger ml-3"
                            for="cilindraje">{{ $errors->first('cilindraje') }}</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="kilometraje" class="col-sm-4 col-form-label">Kilometraje</label>
                <div class="col-sm-7">
                    <input wire:model="kilometraje" type="number" class="form-control" name="kilometraje"
                        value="{{ old('kilometraje') }}"
                        placeholder="Ingrese el Kilometraje">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div style="min-height: 25px">
                    @if ($errors->has('kilometraje'))
                        <small class="error text-danger ml-3"
                            for="kilometraje">{{ $errors->first('kilometraje') }}</small>
                    @endif
                </div>
            </div>

            @if (Auth::user()->hasRole('Asesor'))
                <div class="row">
                    <label for="user_id" class="col-sm-4 col-form-label">Usuario</label>
                    <div class="col-sm-7">
                        <select wire:model="user_id" class="form-control selectpicker" data-style="btn btn-link"
                            name="user_id" id="user_id">
                            <option value="" selected disabled>
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
                        @if ($errors->has('user_id'))
                            <small class="error text-danger ml-3"
                                for="user_id">{{ $errors->first('user_id') }}</small>
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
                <button type="button" wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="btn btn-primary disabled:opacity-25">Registrar</button>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            Livewire.on('close', () => {
                $('#createMotocicleta').modal('hide');
            })
        </script>
    @endpush
</div>
