<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h2 class="card-title">Motocicletas</h2>
                                <p class="card-category">Motocicletas registradas</p>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 text-right">
                                        {{-- @can('motocicleta_create') --}}
                                        {{-- <button class="btn btn-sm btn-facebook">Añadir
                                                Motocicleta</button> --}}

                                        <button class="btn btn-sm btn-facebook" {{-- data-toggle="modal"
                                                data-target="#exampleModal" --}}
                                            wire:click="$emit('open')">Añadir
                                            Motocicleta</button>



                                        <div class="modal fade" id="createMotocicleta" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                @if (Auth::user()->hasRole('Asesor'))
                                                    @livewire('motocicletas.create-motocicletas', ['number' => 1])
                                                @else
                                                    @livewire('motocicletas.create-motocicletas', ['number' => 0])
                                                @endif
                                            </div>
                                        </div>
                                        {{-- @endcan --}}

                                        <div class="modal fade" id="editMotocicleta" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                @if (Auth::user()->hasRole('Asesor'))
                                                    @livewire('motocicletas.edit-motocicletas', ['number' => 1])
                                                @else
                                                    @livewire('motocicletas.edit-motocicletas', ['number' => 0])
                                                @endif
                                                @section('js')
                                                    <script>
                                                        Livewire.on('close', () => {
                                                            $('#exampleModal').modal('hide');
                                                        })

                                                        Livewire.on('open-true', () => {
                                                            $('#createMotocicleta').modal('show');
                                                        })
                                                    </script>
                                                @endsection
                                            </div>
                                        </div>

                                        <div class="modal fade" id="detalleMotocicleta" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                @livewire('motocicletas.detalle-motocicletas')
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="table-responsive mt-4">
                                    <table class="table" id="motocicletas">
                                        <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Placa</th>
                                            <th>Color</th>
                                            <th>Cilindraje</th>
                                            <th>Kilometraje</th>
                                            <th>Propietario</th>
                                            <th>Marca</th>
                                            <th>Categoria</th>
                                            <th>Linea</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($motocicletas as $motocicleta)
                                                <tr>
                                                    <td>{{ $motocicleta->id }}</td>
                                                    <td>{{ $motocicleta->placaMotocicleta }}</td>
                                                    <td>{{ $motocicleta->colorMotocicleta }}</td>
                                                    <td>{{ $motocicleta->cilindraje }} cc</td>
                                                    <td>{{ $motocicleta->kilometraje }}</td>
                                                    <td>{{ $motocicleta->user->name }}</td>
                                                    <td>{{ $motocicleta->marca->nombreMarca }}</td>
                                                    <td>{{ $motocicleta->categoria->nombreCategoria }}</td>
                                                    <td>{{ $motocicleta->linea->nombreLinea }}</td>
                                                    <td class="td-actions text-right">
                                                        {{-- @can('motocicleta_show') --}}
                                                        <a href="#" class="btn btn-sm btn-info"
                                                            wire:click="detalle({{ $motocicleta->id }})"><i
                                                                class="fas fa-info-circle"></i></a>
                                                        {{-- @endcan --}}
                                                        {{-- @can('motocicleta_edit') --}}
                                                        <button class="btn btn-sm btn-warning text-white"
                                                            wire:click="edit({{ $motocicleta->id }})"><i
                                                                class="fas fa-edit"></i></button>

                                                        {{-- @endcan --}}
                                                        {{-- @can('motocicleta_destroy') --}}
                                                        <button class="btn btn-sm btn-danger"
                                                            wire:click="$emit('deleteMotocicleta', {{ $motocicleta->id }})">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                        {{-- @endcan --}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2">Sin registros.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if (!empty($motocicletas))
                                <div class="card-footer mr-auto">
                                    {{ $motocicletas->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            // window.addEventListener('DOMContentLoaded', (event) => {
            //     console.log('DOM fully loaded and parsed');
            // });

            Livewire.on('deleteMotocicleta', motocicletaId => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podras recuperar el registro!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('motocicletas.index-motocicletas', 'delete', motocicletaId)

                        Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado',
                            'success'
                        )
                    }
                })
            })

            Livewire.on('openEditMotocicleta', () => {
                $('#editMotocicleta').modal('show')
            })

            Livewire.on('openDetalleMotocicleta', () => {
                $('#detalleMotocicleta').modal('show')
            })
        </script>
    @endpush

</div>
