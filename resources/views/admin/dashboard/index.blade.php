@extends('admin.commons.index')
@section('content')
<style>
.custom_wrapper a {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: 200px;
    border: 1px solid;
    border-radius: 6px;
    padding: 24px;
    font-size: 24px;
    color: #353535;
}

.custom_wrapper a:hover {
    border: 1px solid #007bff;
    transition: .4s ease-in-out;
}

.custom_wrapper i {
    font-size: 3rem;
}
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                <div class="custom_wrapper">
                    <a href="{{ url('admin/banners/list') }}">
                        <i class="nav-icon fas fa-tv"></i>
                        Banner
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                <div class="custom_wrapper">
                    <a href="{{ url('admin/gallery/list') }}">
                        <i class="nav-icon far fa-image"></i>
                        Gallery
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                <div class="custom_wrapper">
                    <a href="{{ url('admin/brand/list') }}">
                        <i class="nav-icon far fa-copyright"></i>
                        Brand
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                <div class="custom_wrapper">
                    <a href="{{ url('admin/category/list') }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        Category
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                <div class="custom_wrapper">
                    <a href="{{ url('admin/catalogue/list') }}">
                        <i class="nav-icon fas fa-book"></i>
                        Catalogue
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                <div class="custom_wrapper">
                    <a href="{{ url('admin/product/list') }}">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        Product
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3">
                <div class="custom_wrapper">
                    <a href="{{ url('admin/pages/list') }}">
                        <i class="nav-icon fas fa-file"></i>
                        CMS Pages
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection