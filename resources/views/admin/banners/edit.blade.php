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
                            <a href="{{ url('admin/banners/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="banner_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                    name="title" value="{{ $data->title }}">
                            </div>
                            <div class="form-group">
                                <label>Category*</label>
                                <select class="form-control select2bs4" name="category" id="category"
                                    style="width: 100%;">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $data->category == $category->id ? 'selected' : ''}}>
                                        {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <input type="file" class="form-control-file p-2 rounded"
                                        style="border:1px solid #ced4da" id="image" name="image"
                                        onchange="previewFile(this)" accept="image/jpg,image/png,image/jpeg,image/gif">
                                </div>
                                <img width="100px" class="mt-4" src="{{ asset('images/banners/'.$data->image) }}"
                                    alt="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="banner_form_btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    const banner_form_data = [{
            id: 'title',
            type: 'text',
            message: 'Title Required',
        },
        {
            id: 'category',
            type: 'text',
            message: 'Choose Category',
        },
        {
            id: 'image',
            type: 'file',
            message: 'Image Required',
            required: false
        }
    ];
    validator('#banner_form', '#banner_form_btn', "{{ url('admin/banners/update') }}", banner_form_data, id =
        "{{$data->id}}");
});
</script>
@endsection