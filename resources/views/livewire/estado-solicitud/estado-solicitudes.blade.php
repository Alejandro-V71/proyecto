<div>
    @include('livewire.estado-solicitud.createSolEstado')
    @include('livewire.estado-solicitud.updateSolEstado')
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="alert alert-info" style="margin-top:30px;">
                  {{ session('message') }}
                </div>
            @endif
                <table class="table table-bordered mt-5 table table-hover text-center">
                    <thead class="table-primary">
                        <tr class="bg-indigo-600 text-dark">
                            <th class="px-4 py-2">Id</th>
                            <th class="px-4 py-2">Solicitud</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Fecha inicio</th>
                            <th class="px-4 py-2">Fecha Fin</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($solEstados as $value)
                    <tr>
                        <td class="border px-4 py-2">{{$value->id}}</td>
                        <td class="border px-4 py-2">{{$value->SolicitudServicio->descripcionProblema}}</td>
                        <td class="border px-4 py-2">{{$value->Estado->tipoEstado}}</td>
                        <td class="border px-4 py-2">{{$value->fechaIncio}}</td>
                        <td class="border px-4 py-2">{{$value->fechaFin}}</td>
                        <td>
                            <button type="submit" wire:click="editar({{ $value->id }})" data-toggle="modal" data-target="#updateModal" class="btn btn-primary btn-sm">Editar</button>
                            <button type="submit" wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este registro?')">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
