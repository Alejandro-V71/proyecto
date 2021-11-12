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
             <!-- Light table -->
             <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                          <tr>
                              <th scope="col" class="sort" data-sort="name">#</th>
                              <th scope="col" class="sort" data-sort="name">Diagnostico</th>
                              <th scope="col" class="sort" data-sort="name">Solicitud de servicio</th>
                              <th scope="col" class="sort" data-sort="name">Servicio</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if (is_array ($detalleSolicitud) || is_object($detalleSolicitud) )
                        @foreach ($detalleSolicitud as $value)
                        <tr>
                            <td class="budget">{{$value->id}}</td>
                            <td class="budget">{{$value->diagnostico}}</td>
                            <td class="budget">{{$value->solicitudServicio->title}}</td>
                            <td class="budget">{{$value->Servicio->nombreServicio}}</td>
                        </tr>
                    @endforeach
                        @endif

            </tbody>
          </table>
      </div>
       </div>
    </div>
</div>
