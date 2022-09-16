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
                            <a href="{{ url('admin/about/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="about_form" enctype="multipart/form-data" autocomplete="off" novalidate>
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
                                                <a class="nav-link" id="core-values-tab" data-toggle="pill"
                                                    href="#core-values" role="tab" aria-controls="core-values"
                                                    aria-selected="false">Core Values</a>
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
                                                <div class="form-group">
                                                    <label for="description">Description*</label>
                                                    <textarea class="form-control" id="description" rows="7"
                                                        name="description">@isset($data->description){!! $data->description !!}@endisset</textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="core-values" role="tabpanel"
                                                aria-labelledby="core-values-tab">
                                                <div class="form-group">
                                                    <label for="image">Image*</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control-file p-2 rounded"
                                                            style="border:1px solid #ced4da" id="image" name="image"
                                                            onchange="previewFile(this)"
                                                            accept="image/jpg,image/png,image/jpeg,image/gif">
                                                    </div>
                                                    <img width="100px" class="mt-4"
                                                        src="@isset($data->image){{ asset('images/'.$data->image) }}@endisset"
                                                        alt="@isset($data->title){{ $data->title }}@endisset">
                                                </div>
                                                <div class="form-group">
                                                    <label for="brief_description">Core Values*</label>
                                                    <textarea id="brief_description"
                                                        name="brief_description">@isset($data->brief_description){!! $data->brief_description !!}@endisset</textarea>
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
                                        <button class="btn btn-primary" id="about_update_form_btn">Update</button>
                                        @else
                                        <button class="btn btn-primary" id="about_create_form_btn">Create</button>
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
    const about_form_data = [{
            id: 'description',
            type: 'text',
            message: 'Description Required',
        },
        {
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
            id: 'image',
            type: 'file',
            message: 'Image Required',
            required: false
        },
        {
            id: 'brief_description',
            type: 'text',
            message: 'Brief Description Required',
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
    validator('#about_form', '#about_create_form_btn', "{{ url('admin/about/create') }}",
        about_form_data);
    // Update
    validator('#about_form', '#about_update_form_btn', "{{ url('admin/about/update') }}",
        about_form_data, id = "@isset($data->id){{$data->id}}@endisset");
});
</script>
@endsection