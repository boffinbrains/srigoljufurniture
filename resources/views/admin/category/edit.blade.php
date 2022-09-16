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
                            <a href="{{ url('admin/category/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="category_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="title">Category Name*</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $data->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="slug">Slug*</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            value="{{ $data->slug }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="image">Thumbnail</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control-file p-2 rounded"
                                                style="border:1px solid #ced4da" id="image" name="image"
                                                onchange="previewFile(this)"
                                                accept="image/jpg,image/png,image/jpeg,image/gif">
                                        </div>
                                        <img width="100px" class="mt-4"
                                            src="{{ asset('images/category/'.$data->thumbnail) }}"
                                            alt="{{ $data->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $data->meta_title }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="canonical">Canonical</label>
                                        <input type="text" class="form-control" id="canonical" name="canonical" value="{{ $data->canonical }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description"
                                            rows="10">{{ $data->meta_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="analytics">Analytics</label>
                                        <textarea class="form-control" id="analytics" name="analytics"
                                            rows="10">{{ $data->analytics }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="category_form_btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#title').on('keyup', function() {
        var value = $('#title').val();
        $('#slug').val(value.replace(/\s+/g, '-').toLowerCase());
    })
    const category_form_data = [{
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
    validator('#category_form', '#category_form_btn', "{{ url('admin/category/update') }}", category_form_data,
        id = "{{$data->id}}");
});
</script>
@endsection