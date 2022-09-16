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
                            <a href="{{ url('admin/brand/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="brand_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                    name="title">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>
                            <div class="form-group">
                                <label for="image">Image*</label>
                                <div class="input-group">
                                    <input type="file" class="form-control-file p-2 rounded"
                                        style="border:1px solid #ced4da" id="image" name="image"
                                        onchange="previewFile(this)" accept="image/jpg,image/png,image/jpeg,image/gif">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="brand_form_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#title').on('keyup', function() {
    var value = $('#title').val();
    $('#slug').val(value.replace(/\s+/g, '-').toLowerCase());
})
$(document).ready(function() {
    const brand_form_data = [{
            id: 'title',
            type: 'text',
            maxlength: '20',
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
            maxlength: '200',
            message: 'Image Required',
        },
    ];
    validator('#brand_form', '#brand_form_btn', "{{ url('admin/brand/create') }}", brand_form_data);
});
</script>
@endsection