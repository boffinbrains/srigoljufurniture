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
                            <a href="{{ url('admin/presentation/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="presentation_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $data->title }}">
                            </div>
                            <div class="form-group">
                                <label>Brand*</label>
                                <select class="form-control select2bs4" name="brand_id"
                                    id="brand_id" style="width: 100%;">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == $data->brand_id ? 'selected' : '' }}>{{ $brand->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-none">
                                <label for="type">Type*</label>
                                <select name="type" class="form-control" id="type">
                                    <option value="image" selected>Image</option>
                                    <option value="video" {{ $data->type === 'video' ? 'selected' : ''}}>Video</option>
                                </select>
                            </div>
                            <div class="form-group" style="{{ $data->type === 'video' ? 'display:none' : ''}}">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file p-2 rounded"
                                    style="border:1px solid #ced4da" id="image" name="image"
                                    onchange="previewFile(this)" accept="image/jpg,image/png,image/jpeg,image/gif">
                                <img width="100px" class="mt-4" style="{{ $data->type === 'video' ? 'display:none' : ''}}" src="{{ asset('images/presentation/'.$data->image) }}"
                                    alt="{{ $data->title }}">
                            </div>
                            <div class="form-group" style="{{ $data->type === 'image' ? 'display:none' : ''}}">
                                <label for="video">Video</label>
                                <input type="text" class="form-control" name="video" id="video" value="{{ $data->video }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="presentation_form_btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#type').on('change', function() {
        if ($('#type').val() === 'video') {
            $('#image').parent().css('display', 'none');
            $('#video').parent().css('display', 'block');
        } else if ($('#type').val() === 'image') {
            $('#image').parent().css('display', 'block');
            $('#video').parent().css('display', 'none');
        }
    });

    const presentation_form_data = [{
            id: 'title',
            type: 'text',
            message: 'Title Required',
        },
        {
            id: 'image',
            type: 'file',
            message: 'Image Required',
            required: false
        },
        {
            id: 'video',
            type: 'text',
            message: 'Video Required',
            required: false
        },
        {
            id: 'type',
            type: 'text',
            message: 'Type Required',
        },
        {
            id: 'brand_id',
            type: 'text',
            message: 'Brand Required',
        },
    ];
    validator('#presentation_form', '#presentation_form_btn', "{{ url('admin/presentation/update') }}",
        presentation_form_data, id = "{{$data->id}}");
});
</script>
@endsection