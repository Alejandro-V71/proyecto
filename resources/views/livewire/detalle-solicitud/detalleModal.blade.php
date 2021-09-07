<!-- Modal -->
<div wire:ignore.self class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered mt-5 table table-hover text-center">
                    <thead class="table-primary">
                        <tr class="bg-indigo-600 text-dark">
                            <th class="px-4 py-2">Id</th>
                            <th class="px-4 py-2">Diagnostico</th>
                            <th class="px-4 py-2">Solicitud de servicio</th>
                            <th class="px-4 py-2">Servicio</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($detalle as $value)
                    <tr>
                        <td class="border px-4 py-2">{{$value->id}}</td>
                        <td class="border px-4 py-2">{{$value->diagnostico}}</td>
                        <td class="border px-4 py-2">{{$value->solicitud_servicio_id}}</td>
                        <td class="border px-4 py-2">{{$value->servicio_id}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="updateDetalle()" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>
