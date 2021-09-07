<div>
    @include('livewire.solicitudes.createSolicitud')
    @include('livewire.solicitudes.updateSolicitud')
    @include('livewire.detalle-solicitud.detalleModal')
    @include('livewire.detalle-solicitud.detalle')
    <div class="py-12">
        <button type="submit" wire:click="" data-toggle="collapse" href="#mostrarDetalles" class="btn btn-primary btn-sm">Detalles</button>
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
                            <th class="px-4 py-2">Usuario</th>
                            <th class="px-4 py-2">Títuto</th>
                            <th class="px-4 py-2">Comienzo</th>
                            <th class="px-4 py-2">Fin</th>
                            <th class="px-4 py-2">Hora solicitud de servicio</th>
                            <th class="px-4 py-2">Fecha solicitud de servicio</th>
                            <th class="px-4 py-2">Descripción problema</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($solicitudes as $value)
                    <tr>
                        <td class="border px-4 py-2">{{$value->id}}</td>
                        <td class="border px-4 py-2">{{$value->User->name}}</td>
                        <td class="border px-4 py-2">{{$value->title}}</td>
                        <td class="border px-4 py-2">{{$value->Start}}</td>
                        <td class="border px-4 py-2">{{$value->End}}</td>
                        <td class="border px-4 py-2">{{$value->horaSolcitudServicio}}</td>
                        <td class="border px-4 py-2">{{$value->fechaSolicitudServicio}}</td>
                        <td class="border px-4 py-2">{{$value->descripcionProblema}}</td>
                        <td>
                            <button type="submit" wire:click="editar({{ $value->id }})"  data-toggle="modal" data-target="#updateModal" class="btn btn-primary btn-sm">Editar</button>
                            <button type="submit" wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este registro?')">Eliminar</button>
                            <button type="submit"  wire:click="render({{ $value->id }})" data-toggle="modal" data-target="#detalleModal" class="btn btn-primary btn-sm">Detalles</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
    </div>
