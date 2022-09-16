<!-- Brand Logo -->
<a href="{{ url('admin/dashboard') }}" class="brand-link d-flex flex-column justify-content-center text-center">
    <img src="{{ asset('images/sri-golju-furniture-industries-logo.png') }}" alt="Jain Tiles Industries">
    <span class="brand-text font-weight-light">Sri Golju Furniture Industries</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('admin/dashboard') }}" class="nav-link @if (Request::is('admin/dashboard')) active @endif">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @php
                $list = ['banners', 'brand', 'certificate', 'gallery', 'store', 'category', 'catalogue', 'product', 'about', 'testimonial', 'home'];
            @endphp
            @can('isAdmin')
                <li
                    class="nav-item has-treeview @for ($i = 0; $i < count($list) ; $i++)@if (Request::is('admin/' . $list[$i] . '/*')) menu-open @endif @endfor">
                    <a href="#"
                        class="nav-link @for ($i = 0; $i < count($list) ; $i++)@if (Request::is('admin/' . $list[$i] . '/*')) active @endif @endfor">
                        <p>
                            <i class="nav-icon fas fa-globe"></i>
                            Website
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/home/index') }}"
                                class="nav-link @if (Request::is('admin/home/*')) active @endif">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/about/index') }}"
                                class="nav-link @if (Request::is('admin/about/*')) active @endif">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    About
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/banners/list') }}"
                                class="nav-link @if (Request::is('admin/banners/*')) active @endif">
                                <i class="nav-icon fas fa-tv"></i>
                                <p>
                                    Banners
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/brand/list') }}"
                                class="nav-link @if (Request::is('admin/brand/*')) active @endif">
                                <i class="nav-icon fas fa-copyright"></i>
                                <p>
                                    Brands
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/certificate/list') }}"
                                class="nav-link @if (Request::is('admin/certificate/*')) active @endif">
                                <i class="nav-icon fas fa-certificate"></i>
                                <p>
                                    Certificates
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/gallery/list') }}"
                                class="nav-link @if (Request::is('admin/gallery/*')) active @endif">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/store/list') }}"
                                class="nav-link @if (Request::is('admin/store/*')) active @endif">
                                <i class="nav-icon fas fa-store"></i>
                                <p>
                                    Stores
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/category/list') }}"
                                class="nav-link @if (Request::is('admin/category/*')) active @endif">
                                <i class="nav-icon fas fa-th-large"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/catalogue/list') }}"
                                class="nav-link @if (Request::is('admin/catalogue/*')) active @endif">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Catalogue
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/product/list') }}"
                                class="nav-link @if (Request::is('admin/product/*')) active @endif">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/testimonial/list') }}"
                                class="nav-link @if (Request::is('admin/testimonial/*')) active @endif">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Testimonial
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @php
                $crmList = ['bank', 'quotation', 'customer', 'presentation', 'user', 'order-slip', 'role', 'permission'];
            @endphp
            <li
                class="nav-item has-treeview @for ($i = 0; $i < count($crmList) ; $i++)@if (Request::is('admin/' . $crmList[$i] . '/*')) menu-open @endif @endfor">
                <a href="#"
                    class="nav-link @for ($i = 0; $i < count($crmList) ; $i++)@if (Request::is('admin/' . $crmList[$i] . '/*')) active @endif @endfor">
                    <p>
                        <i class="nav-icon fas fa-globe"></i>
                        CRM
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('isAdmin')
                        <li class="nav-item">
                            <a href="{{ url('admin/bank/list') }}"
                                class="nav-link @if (Request::is('admin/bank/*')) active @endif">
                                <i class="nav-icon fas fa-money-check"></i>
                                <p>
                                    Bank
                                </p>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ url('admin/quotation/list') }}"
                            class="nav-link @if (Request::is('admin/quotation/*')) active @endif">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Quotation
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/customer/list') }}"
                            class="nav-link @if (Request::is('admin/customer/*')) active @endif">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Customers
                            </p>
                        </a>
                    </li>
                    @can('isAdmin')
                        <li class="nav-item">
                            <a href="{{ url('admin/presentation/list') }}"
                                class="nav-link @if (Request::is('admin/presentation/*')) active @endif">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Presentations
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('isAdmin')
                        <li class="nav-item">
                            <a href="{{ url('admin/user/list') }}"
                                class="nav-link @if (Request::is('admin/user/*')) active @endif">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Employees
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/role/list') }}"
                                class="nav-link @if (Request::is('admin/role/*')) active @endif">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Roles
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/permission/list') }}"
                                class="nav-link @if (Request::is('admin/permission/*')) active @endif">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Permissions
                                </p>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ url('admin/order-slip/list') }}"
                            class="nav-link @if (Request::is('admin/order-slip/*')) active @endif">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Orders Slip
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <p>
                        <i class="nav-icon fas fa-globe"></i>
                        Policy
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('isAdmin')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-money-check"></i>
                                <p>
                                    Terms & Conditions
                                </p>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Privacy Policy
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Services & Support
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
