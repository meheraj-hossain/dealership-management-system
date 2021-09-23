<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('assets/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('make_order')}}" class="nav-link active">

                        <p>
                           Make Order
                        </p>
                    </a>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Area manager
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('area_manager.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Area Manager</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('area_manager.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Area Manager</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Shopkeeper
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('shopkeeper.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Shopkeeper</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('shopkeeper.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Shopkeeper</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{route('shop_registration.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Shop Registration

                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('inventory.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Inventory List

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Inventory
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fas fa-gas-pump"></i>
                                <p>
                                    Beverage
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('inventory.create','beverages')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Add Beverages</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fas fa-gas-pump"></i>
                                <p>
                                    Snacks
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('inventory.create','snacks')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Add Snacks</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Stock
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Fuel
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Purchased</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Supplied</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Raw Material
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Purchased</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Supplied</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Business Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fas fa-gas-pump"></i>
                                <p>
                                    Beverage
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('beverage_category.index')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('beverage_size.index')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Size</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('beverage_flavor.index')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Flavor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fas fa-gas-pump"></i>
                                <p>
                                    Snacks
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('snacks_category.index')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('snacks_size.index')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Size</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('snacks_flavor.index')}}" class="nav-link">
                                        <i class="fa fa-angle-double-right nav-icon"></i>
                                        <p>Flavor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{route('area.index')}}" class="nav-link">
                                <i class="far fas fa-gas-pump"></i>
                                <p>
                                    Area
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{route('stock.index')}}" class="nav-link">
                                <i class="far fas fa-gas-pump"></i>
                                <p>
                                    Stock
                                    <i class="right fas fa-angle-left"></i>
                                </p>
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

