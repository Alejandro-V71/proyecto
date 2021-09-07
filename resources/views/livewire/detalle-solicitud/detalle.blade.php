<div id="mostrarDetalles">
    @include('livewire.detalle-solicitud.createDetalles')
    @include('livewire.detalle-solicitud.updateDetalles')
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="alert alert-info" style="margin-top:30px;">
                  {{ session('message') }}
                </div>
            @endif

                <table class="table table-bordered mt-5 table table-hover text-center">
                    <button type="submit" wire:click="storeDetalle()" data-toggle="modal" data-target="#storeDetalle" class="btn btn-primary btn-sm">Nuevo</button>
                    <thead class="table-primary">
                        <tr class="bg-indigo-600 text-dark">
                            <th class="px-4 py-2">Id</th>
                            <th class="px-4 py-2">Diagnostico</th>
                            <th class="px-4 py-2">Solicitud de servicio</th>
                            <th class="px-4 py-2">Servicio</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($detalles as $value)
                    <tr>
                        <td class="border px-4 py-2">{{$value->id}}</td>
                        <td class="border px-4 py-2">{{$value->diagnostico}}</td>
                        <td class="border px-4 py-2">{{$value->solicitudServicio->title}}</td>
                        <td class="border px-4 py-2">{{$value->servicio->nombreServicio}}</td>
                        <td>
                            <button type="submit" wire:click="show({{ $value->id }})" data-toggle="modal" data-target="#updateDetalle" class="btn btn-primary btn-sm">Editar</button>
                            <button type="submit" wire:click="deleteDetalle({{ $value->id }})" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este registro?')">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
    </div>
