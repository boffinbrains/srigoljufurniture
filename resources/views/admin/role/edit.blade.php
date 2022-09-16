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
                            <a href="{{ url('admin/role/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="role_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $data->title }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ $data->description }}">
                            </div>
                            <div class="form-group">
                                <label>Permissions</label>
                                <select class="select2" name="permissions" id="permissions" multiple="multiple"
                                    data-placeholder="Assign Permissions" style="width: 100%;">
                                    @php
                                    $i = 0
                                    @endphp
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}"
                                        {{ in_array($permission->id,$rolePermission) ? 'selected' : '' }}>
                                        {{ $permission->name }}</option>
                                    @php
                                    $i++
                                    @endphp
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer pl-0">
                                <button class="btn btn-primary" id="role_form_btn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CheckBox -->
<script src="{{ asset('adminlte/js/select2.full.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
    $('.select2').select2();
    const role_form_data = [{
            id: 'title',
            type: 'text',
            message: 'Title Required',
        },
        {
            id: 'name',
            type: 'text',
            message: 'Name Required',
        },
        {
            id: 'description',
            type: 'text',
            message: 'Description Required',
            required: false
        },
        {
            id: 'permissions',
            type: 'text',
            message: 'Permissions Required',
        }
    ];
    validator('#role_form', '#role_form_btn', "{{ url('admin/role/update') }}",
        role_form_data, id = "{{$data->id}}");
});
</script>
@endsection