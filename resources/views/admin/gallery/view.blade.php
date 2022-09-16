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
                            <a href="{{ url('admin/gallery/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="gallery_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                    name="title">
                            </div>
                            <div class="form-group">
                                <label for="image">Image*<small class="text-danger"> must be under 1 Mb</small></label>
                                <div class="input-group">
                                    <input type="file" class="form-control-file p-2 rounded"
                                        style="border:1px solid #ced4da" id="image" name="image"
                                        onchange="previewFile(this)" accept="image/jpg,image/png,image/jpeg,image/gif">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="gallery_form_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <table id="list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($data)
                                        @foreach ($data as $value)
                                        <tr>
                                            <td>
                                                {{$value->title}}
                                            </td>
                                            <td>
                                                <img src="{{ asset('images/gallery/'.$value->path) }}" width="50px"
                                                    alt="{{$value->title}}">
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#gallery-modal{{$value->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="gallery-modal{{$value->id }}" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Do you want to
                                                            delete?</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Cancel</button>
                                                        <a type="button"
                                                            href="{{ url('admin/gallery/galleryDelete/'.$value->id) }}"
                                                            class="btn btn-primary">
                                                            Ok</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
            id: 'image',
            type: 'file',
            message: 'Image Required',
        },
    ];
    validator('#gallery_form', '#gallery_form_btn', "{{ url('admin/gallery/galleryCreate/'.$id) }}",
        banner_form_data);
});
</script>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/css/datatables/buttons.bootstrap4.min.css') }}">
<script src="{{ asset('adminlte/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/js/datatables/buttons.bootstrap4.min.js') }}"></script>
<script>
$(function() {
    $("#list").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "sorting": [
            [0, "desc"]
        ]
    }).buttons().container().appendTo('#list_wrapper .col-md-6:eq(0)');
});
</script>
@endsection