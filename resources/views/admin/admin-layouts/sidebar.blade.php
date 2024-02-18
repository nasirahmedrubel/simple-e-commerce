<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LARAVEL SHOP</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.daskboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>																
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.products')}}" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Admin-Products</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{route('admin.products')}}" class="nav-link">
                        <!-- <i class="nav-icon fas fa-tag"></i> -->
                        <i class="fas fa-truck nav-icon"></i>
                        <p>Product</p>
                    </a>
                </li>							
                <li class="nav-item">
                    <a href="orders.html" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.getimages')}}" class="nav-link">
                        <i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
                        <p>GetImages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="users.html" class="nav-link">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages.html" class="nav-link">
                        <i class="nav-icon  far fa-file-alt"></i>
                        <p>Pages</p>
                    </a>
                </li>							
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>