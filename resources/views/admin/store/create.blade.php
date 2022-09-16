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
                            <a href="{{ url('admin/store/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="store_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="title">Name*</label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                            name="title">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="image">Image*</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control-file p-2 rounded"
                                                style="border:1px solid #ced4da" id="image" name="image"
                                                onchange="previewFile(this)"
                                                accept="image/jpg,image/png,image/jpeg,image/gif">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number*</label>
                                        <input type="tel" class="form-control" id="mobile_number"
                                            placeholder="Enter Mobile Number" name="mobile_number">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                            name="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">Address*</label>
                                        <textarea type="text" class="form-control" id="description"
                                            placeholder="Enter description" name="description" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="store_form_btn">Save</button>
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
            id: 'mobile_number',
            type: 'tel',
            message: 'Mobile Number Required',
        },
        {
            id: 'email',
            type: 'email',
            message: 'Email Required',
        },
        {
            id: 'description',
            type: 'text',
            message: 'Description Required',
        },
        {
            id: 'image',
            type: 'file',
            message: 'Image Required',
        },
    ];
    validator('#store_form', '#store_form_btn', "{{ url('admin/store/create') }}", banner_form_data);
});
</script>
@endsection