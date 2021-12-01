<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->

        <!--Breadcrumns-->
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">



        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span >
                  <img class="avatar avatar-sm rounded-circle mx-auto">

                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">
                      {{ Auth::user()->name }}</span>
                      <span class="mb-0 text-sm  font-weight-bold">{{   Auth::user()->getRoleNames()[0]}}
                    </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenido!</h6>
              </div>
              

              <div class="dropdown-divider"></div>
              <a href="{{route('logout')}}" class="dropdown-item">

                <span>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Cerrar Sesión') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
                </span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
