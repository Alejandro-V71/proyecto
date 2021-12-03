<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Inicio</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- Card stats -->

            <div class="row">
                @if (Auth::user()->hasRole('Cliente'))
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">

                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Solicitudes</h5>
                            <span class="h2 font-weight-bold mb-0">{{$solicitudes}}</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                              <i class="ni ni-bulb-61"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @else


              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">

                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Solicitudes</h5>
                        <span class="h2 font-weight-bold mb-0">{{$solicitudes}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                          <i class="ni ni-bulb-61"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Usuarios</h5>
                        <span class="h2 font-weight-bold mb-0">{{$user}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="ni ni-circle-08"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Servicios</h5>
                        <span class="h2 font-weight-bold mb-0">{{$servicios}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                          <i class="ni ni-settings"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Repuestos</h5>
                        <span class="h2 font-weight-bold mb-0">{{$repuestos}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                          <i class="ni ni-archive-2"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- TABLA DE CONTENIDO --->

      <div class="row mt-5">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Solicitudes</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Solicitudes</th>

                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <td>
                      Solicitudes en Espera
                    </td>
                    <td>
                    {{$estadoEspera}}
                    </td>

                  </tr>

                  <tr>

                    <td>
                      Solicitudes en Cotización
                    </td>
                    <td>
                    {{$estadoContizacion}}
                    </td>

                  </tr>
                  <tr>

                    <td>
                      Solicitudes en Ejecución
                    </td>
                    <td>
                    {{$estadoEjecucion}}
                    </td>

                  </tr>
                  <tr>

                    <td>
                      Solicitudes en Cuenta de cobro
                    </td>
                    <td>
                    {{$estadoCuenta}}
                    </td>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>


@endif
</div>
