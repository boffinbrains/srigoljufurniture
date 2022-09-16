@extends('admin.commons.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $fieldName }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $fieldName }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">{{ $blade }}</h3>
                        <div class="card-tools">
                            <!--<a href="{{ url('admin/home/list') }}" class="btn btn-tool">-->
                            <!--    <i class="fas fa-arrow-left"></i>-->
                            <!--</a>-->
                        </div>
                    </div>
                    <form id="home_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <div class="card card-primary card-outline card-outline-tabs">
                                    <div class="card-header p-0 border-bottom-0">
                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="seo-tab" data-toggle="pill" href="#seo"
                                                    role="tab" aria-controls="seo" aria-selected="false">SEO</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade active show" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="form-group">
                                                    <label for="title">Title*</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        value="@isset($data->title){{ $data->title }}@endisset">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Slug*</label>
                                                    <input type="text" class="form-control" id="slug" name="slug"
                                                        value="@isset($data->slug){{ $data->slug }}@endisset">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="seo" role="tabpanel"
                                                aria-labelledby="seo-tab">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="meta_title">Meta Title</label>
                                                            <input type="text" class="form-control" id="meta_title"
                                                                name="meta_title"
                                                                value="@isset($data->meta_title){{ $data->meta_title }}@endisset">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="canonical">Canonical</label>
                                                            <input type="text" class="form-control" id="canonical"
                                                                name="canonical"
                                                                value="@isset($data->canonical){{ $data->canonical }}@endisset">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="meta_description">Meta Description</label>
                                                            <textarea class="form-control" id="meta_description"
                                                                name="meta_description"
                                                                rows="10">@isset($data->meta_description){{ $data->meta_description }}@endisset</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="analytics">Analytics</label>
                                                            <textarea class="form-control" id="analytics"
                                                                name="analytics"
                                                                rows="10">@isset($data->analytics){{ $data->analytics }}@endisset</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        @isset ($data->id)
                                        <button class="btn btn-primary" id="home_update_form_btn">Update</button>
                                        @else
                                        <button class="btn btn-primary" id="home_create_form_btn">Create</button>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Summernote -->
<script src="{{ asset('adminlte/js/summernote-bs4.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#slug').on('keydown', function() {
        var value = $('#slug').val();
        $('#slug').val(value.replace(/\s+/g, '-').toLowerCase());
    })
    // Summernote
    $('#brief_description').summernote({
        'height': 400
    })
    const home_form_data = [{
            id: 'title',
            type: 'text',
            message: 'Title Required',
        },
        {
            id: 'slug',
            type: 'text',
            message: 'Slug Required',
        },
        {
            id: 'meta_title',
            type: 'text',
            required: false
        },
        {
            id: 'meta_description',
            type: 'text',
            required: false
        },
        {
            id: 'canonical',
            type: 'text',
            required: false
        },
        {
            id: 'analytics',
            type: 'text',
            required: false
        },
    ];
    // Create
    validator('#home_form', '#home_create_form_btn', "{{ url('admin/home/create') }}",
        home_form_data);
    // Update
    validator('#home_form', '#home_update_form_btn', "{{ url('admin/home/update') }}",
        home_form_data, id = "@isset($data->id){{$data->id}}@endisset");
});
</script>
@endsection