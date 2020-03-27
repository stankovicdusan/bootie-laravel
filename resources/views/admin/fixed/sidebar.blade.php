<div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <!--  OVDE CE ICI IME TRENUTNO LOGOVANOG   -->
                    <a href="#" class="d-block">{{ session()->get("user")->firstName }} {{ session()->get("user")->lastName }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Products
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("products.index") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Show products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("products.create") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add product</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("users.index") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Show users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("users.create") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add user</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Categories
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("categories.index") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Show categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("categories.create") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add category</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("statistics") }}" class="nav-linkx`">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Statistics</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
