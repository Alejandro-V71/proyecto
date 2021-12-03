<div>
    @if ($motocicleta)
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Detalle Motocicleta
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label for="motocicleta.placaMotocicleta" class="col-sm-4 col-form-label">Placa:</label>
                    <div class="col-sm-7">
                        {{ $motocicleta->placaMotocicleta }}
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
                    <label for="motocicleta.colorMotocicleta" class="col-sm-4 col-form-label">Color:</label>
                    <div class="col-sm-7">
                        {{ $motocicleta->colorMotocicleta }}
                    </div>
                </div>

                <div class="row">
                    <label for="motocicleta.marca_id" class="col-sm-4 col-form-label">Marca:</label>
                    <div class="col-sm-7">
                        {{ $motocicleta->marca->nombreMarca }}
                    </div>
                </div>

                <div class="row">
                    <label for="motocicleta.categoria_id" class="col-sm-4 col-form-label">Categoria:</label>
                    <div class="col-sm-7">
                        {{ $motocicleta->categoria->nombreCategoria }}
                    </div>
                </div>

                <div class="row">
                    <label for="motocicleta.linea_id" class="col-sm-4 col-form-label">Linea:</label>
                    <div class="col-sm-7">
                        {{ $motocicleta->linea->nombreLinea }}
                    </div>
                </div>

                <div class="row">
                    <label for="motocicleta.cilindraje" class="col-sm-4 col-form-label">Cilindraje:</label>
                    <div class="col-sm-7">
                        {{ $motocicleta->cilindraje }}
                    </div>
                </div>
                <div class="row">
                    <label for="motocicleta.kilometraje" class="col-sm-4 col-form-label">kilometraje:</label>
                    <div class="col-sm-7">
                        {{ $motocicleta->kilometraje }}
                    </div>
                </div>
                @if (Auth::user()->hasRole('Asesor'))
                    <div class="row">
                        <label for="motocicleta.user_id" class="col-sm-4 col-form-label">Usuario:</label>
                        <div class="col-sm-7">
                            {{ $motocicleta->user->name }}
                        </div>
                    </div>
                @endif
                <div class="modal-footer d-flex justify-content-around">

                    <div class="p-3 text-white">
                        <button type="button" class="btn btn-secondary disabled:opacity-25"
                            data-dismiss="modal">Cerrar</button>
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
    @endif
</div>
