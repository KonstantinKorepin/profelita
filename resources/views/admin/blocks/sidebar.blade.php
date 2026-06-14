<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">Содержимое</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Мастера
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('masters.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список мастеров</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
