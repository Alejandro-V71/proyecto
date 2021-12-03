<div class="navbar-inner">

<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Nav items -->
    <ul class="navbar-nav">
      <li class="nav-item">
        @can('dash')
        <a class="nav-link {{request()->is('dash') ? 'active' : ''}}" href="{{route('dash')}}">

            <i class="ni ni-tv-2 text-orange"></i>
            <span class="nav-link-text">Inicio</span>

        @endcan


        </a>
      </li>
      <li class="nav-item">
          @can('dash.usuario.index')
          <a class="nav-link {{request()->is('dash/asesor/usuario') ? 'active' : ''}}" href="{{route('usuarios')}}">
            <i class="ni ni-circle-08 text-orange"></i>
            <span class="nav-link-text">Usuarios</span>
            @endcan

            <li class="nav-item">
                @can('dash.calendario.index')
                <a class="nav-link {{request()->is('dash/tecnico/calendario') ? 'active' : ''}}" href="{{route('calendario')}}">
                  <i class="ni ni-calendar-grid-58 text-orange"></i>
                  <span class="nav-link-text">Calendario</span>
                @endcan

              </a>
            </li>
            <li class="nav-item">
                @can('dash.solicitudes.index')
                <a class="nav-link {{request()->is('dash/asesor/solicitudes') ? 'active' : ''}}" href="{{route('solicitudes')}}">
                  <i class="ni ni-bulb-61 text-orange"></i>
                  <span class="nav-link-text">Solicitudes</span>
                  @endcan

                </a>
            </li>
        </a>
      </li>
      <li class="nav-item">
          <!-- @can('dash.motocicleta.index') -->
          <a class="nav-link {{request()->is('dash/cliente/motocicletas') ? 'active' : ''}}" href="{{route('motocicletas')}}">
            <i class="ni ni-bulb-61 text-orange"></i>
            <span class="nav-link-text">Motocicleta</span>
            <!-- @endcan -->

        </a>
    </li>
    <li class="nav-item">
        @can('dash.solicitudes.estado')
        <a class="nav-link {{request()->is('dash/asesor/estadoSolicitud') ? 'active' : ''}}" href="{{route('solicitudesEstado')}}">
          <i class="ni ni-bullet-list-67 text-orange"></i>
          <span class="nav-link-text">Estado de solicitud</span>
        @endcan

      </a>
    </li>
      <li class="nav-item">
          @can('dash.solicitudes.detalle')
          <a class="nav-link {{request()->is('dash/asesor/servicio') ? 'active' : ''}}" href="{{route('servicios')}}">
            <i class="ni ni-settings text-orange"></i>
            <span class="nav-link-text">Servicios</span>
          @endcan

        </a>
      </li>
      <li class="nav-item">
          @can('dash.reporteEstado.index')
          <a class="nav-link {{request()->is('dash/tecnico/reporte') ? 'active' : ''}}" href="{{route('reporte')}}">
            <i class="ni ni-archive-2 text-orange"></i>
          <span class="nav-link-text">Reportes</span>
          @endcan

        </a>
    </li>
    <li class="nav-item">
      @can('dash.reporteCuenta.index')
      <a class="nav-link {{request()->is('dash/tecnico/cuenta') ? 'active' : ''}}" href="{{route('reporteCuenta')}}">
        <i class="ni ni-archive-2 text-orange"></i>
      <span class="nav-link-text">Cuenta</span>

      @endcan


    </a>
</li>
<li class="nav-item">
    @can('dash.reporteCuenta.index')
    <a class="nav-link {{request()->is('dash/tecnico/reporte/final') ? 'active' : ''}}" href="{{route('reporteFinal')}}">
      <i class="ni ni-archive-2 text-orange"></i>
    <span class="nav-link-text">Reporte Final</span>

    @endcan


  </a>
</li>
    <li class="nav-item">
          @can('dash.repuestos.index')
          <a class="nav-link {{request()->is('dash/tecnico/repuestos') ? 'active' : ''}} " href="{{route('repuesto')}}">
            <i class="ni ni-settings-gear-65 text-orange"></i>
            <span class="nav-link-text">Repuestos</span>
            @endcan

        </a>
      </li>


    </ul>
    </ul>
  </div>
</div>
