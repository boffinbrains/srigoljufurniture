<header class="top_bar box_shadow">
    <div class="py-2 bg-dark text-white d-lg-flex d-md-flex d-sm-none d-none">
        <div class="d-flex justify-content-between container-fluid">
            <span>
                <i class="bi bi-envelope"></i>
                Email Us: sales.srigoljufurniture@gmail.com
            </span>
            <span>
                <i class="bi bi-telephone pr-2"></i>
                Call Us: 1800-123-777-778 (Toll Free)
            </span>
        </div>
    </div>
    <nav
        class="container-fluid d-flex align-items-center justify-content-between flex-lg-row flex-md-row flex-sm-column flex-column flex-grow-1">
        <div
            class="w-sm-100 d-flex align-items-center flex-grow-1 justify-content-lg-start justify-content-md-start justify-content-sm-between justify-content-between py-lg-0 py-md-2 py-sm-2 py-2">
            <i class="bi bi-list h3 d-lg-none d-md-flex d-sm-flex d-flex mr-2" onclick="transform('open','.nav_bar')"></i>
            <div class="logo_wrapper">
                <a href="{{ url('/') }}" title="Sri Golju Furniture Industries">
                    <img src="{{ asset('home/images/sri-golju-furniture-industries-logo.png') }}"
                        alt="Sri Golju Furniture Industries" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="nav_bar">
            <ul class="list-unstyled m-0 d-flex flex-lg-row flex-md-column flex-sm-column flex-column flex-grow-1">
                <div class="d-lg-none d-md-flex d-sm-flex d-flex justify-content-end">
                    <i class="bi bi-x h3" onclick="transform('close','.nav_bar')"></i>
                </div>
                <li>
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active_menu' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('about-us') }}" class="nav-link {{ Request::is('about-us') ? 'active_menu' : '' }}">
                        About Us
                    </a>
                </li>
                <li>
                    <a class="drop_down nav-link {{ Request::is('products-list') ? 'active_menu' : '' }}">
                        Products
                    </a>
                    <!-- DropDown -->
                    <div class="drop_down_item rounded container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 scroll-sm">
                                <div class="row">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($categories as $category)
                                        <div
                                            class="col-lg-3 col-md-12 col-sm-12 col-12 {{ ++$i % 4 ? 'border-right' : '' }} @if (Request::is($category->slug)) text-danger @endif">
                                            <a class="w-100 d-flex px-xl-3 px-lg-2 px-md-2 px-sm-2 px-2 py-2"
                                                href="{{ url($category->slug) }}">
                                                {{ $category->title }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ url('catalogue/download') }}"
                        class="nav-link {{ Request::is('catalogue/download') ? 'active_menu' : '' }}">
                        Download Catalogues
                    </a>
                </li>
                <li>
                    <a href="{{ url('media-center') }}"
                        class="nav-link {{ Request::is('media-center') ? 'active_menu' : '' }}">
                        Media Center
                    </a>
                </li>
                <li>
                    <a href="{{ url('contact-us') }}"
                        class="nav-link {{ Request::is('contact-us') ? 'active_menu' : '' }}">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>
        <form action="{{ url('/search') }}" method="get"
            class="w-sm-100 d-flex align-items-center mb-lg-0 mb-md-0 mb-sm-2 mb-2" style="min-width:200px">
            <div class="input-group">
                <input type="search" class="form-control" name="search"
                    placeholder="Search your desired furniture here"
                    style="background:#f1f1f1;border: 1px solid;border-radius:4px 0px 0px 4px;" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </nav>
</header>
{{-- Location Modal --}}
{{-- <div class="modal fade" id="location" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="w-100 p-lg-4 p-md-3 p-sm-3 p-3 shadow">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Choose Location</h3>
                    <i class="bi bi-x h3" title="close" data-dismiss="modal"></i>
                </div>
                <button class="location_btn" data-location="1" type="button">Haldwani</button>
                <button class="location_btn" data-location="2" type="button">Dehradun</button>
            </div>
        </div>
    </div>
</div> --}}
