<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home "></i>
                <p>Inicio</p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('dashboard/tours*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('dashboard/tours*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-map"></i>
                <p>Tours
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard.tours.index') }}" class="nav-link {{ request()->is('dashboard/tours') ? 'active' : '' }}">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Ver todos los Tours</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus nav-icon"></i>
                        <p>Crear Tours</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->is('dashboard/list-tours*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('dashboard/tours-popular*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>Listas Personalizadas
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard.populartours.index') }}" class="nav-link {{ request()->is('dashboard/tours-popular') ? 'active' : '' }}">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Tours | Home</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
