    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"> 
            <br>
        </div>
        <div class="list-group list-group-flush">
          <a href="{{route('admin.index')}}"      class="list-group-item list-group-item-action bg-light @if(Request::is('admin')) active @endif">Dashboard</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Mis Propiedades</a>
          <a href="{{route('admin.properties')}}"   class="list-group-item list-group-item-action bg-light @if(Request::is('admin/listings')) active @endif">Propiedades</a>
          <a href="{{route('admin.listings.create')}}" class="list-group-item list-group-item-action bg-light @if(Request::is('admin/listings/create')) active @endif">Nueva Propiedad</a>
        
         @if(Auth::user()->role='administrator')
          <a href="{{route('admin.services.index')}}" class="list-group-item list-group-item-action bg-light @if(Request::is('admin/services')) active @endif">Servicios</a>
        @endif

          <a href="#" class="list-group-item list-group-item-action bg-light">Perfil</a>
          <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-light"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->