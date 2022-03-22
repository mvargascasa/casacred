



<nav id="sidebarMenu" class="col-md-2 p-0 d-md-block sidebar collapse nav-pills" style="border-right: 1px darkgray solid;">
    <div class="position-sticky">
        <ul class="nav flex-column list-group">
            <li class="nav-item list-group-item" @if(Request::is('admin')) style="background-color: beige" @endif>
                <a class="nav-link" href="{{route('admin.index')}}">Dashboard</a>
            </li>
            <li class="nav-item list-group-item" @if(Request::is('admin/listing*')) style="background-color: beige" @endif>
                <a class="nav-link" href="#getting-started-collapse" data-toggle="collapse">Propiedades</a>
                <ul class="list-group font-weight-normal mb-2 collapse @if(Request::is('admin/listing*')) show @endif" id="getting-started-collapse">
                <li class="list-group-item @if(Request::is('admin/listings')) active @endif"><a href="{{route('admin.listings')}}">Lista de Propiedades</a></li>
                <li class="list-group-item @if(Request::is('admin/listingadd')) active @endif"><a href="{{route('admin.listingadd')}}" class="">Nueva Propiedad</a></li>
                <li class="list-group-item"><a href="{{route('admin.listings')}}">Beneficios Prop</a></li>
                <li class="list-group-item"><a href="{{route('admin.listings')}}">Servicios Prop</a></li>
              </ul>
            </li>
            <li class="nav-item list-group-item @if(Request::is('home/categor*')) bg-secondary @endif">
                <a class="nav-link" href="#">Notificaciones</a>
            </li>
            <li class="nav-item list-group-item @if(Request::is('home/user*')) bg-secondary @endif">
                <a class="nav-link" href="#">Servicios </a>
            </li>
            <li class="nav-item list-group-item @if(Request::is('home/user*')) bg-secondary @endif">
                <a class="nav-link" href="#">Perfil </a>
            </li>
        </ul>
    </div>
</nav>


