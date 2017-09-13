<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Sinchi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            @if (Auth::guest())            
              <li class="nav-item active"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>                            
            @else
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} </a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">                                   
                @if (Auth::user()->rol=='Administrador')
                    <a class="dropdown-item" href="{{ url('/registro') }}">Registro</a>
                    <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ url('/editarborrar') }}"> Editar registros</a>
                @endif
                @if (Auth::user()->rol=='Colector')
                    <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>    
                    <a class="dropdown-item" href="{{ url('/editarborrar') }}"> Editar registros</a>
                @endif
                @if (Auth::user()->rol=='Consultor')
                    <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a> 
                @endif                    
                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>