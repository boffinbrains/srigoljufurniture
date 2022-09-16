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
                            <a class="btn btn-primary" href="{{ url('presentation/index') }}" target="_blank">
                                View Catalogue
                            </a>
                            <a class="btn btn-primary" href="{{ url('presentation') }}" target="_blank">
                                View Presentation
                            </a>
                            <a href="{{ url('admin/presentation/add') }}" class="btn btn-tool">
                                <i class="bi bi-plus-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <table id="list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <!--<th>Type</th>-->
                                            <th>Image</th>
                                            <th>Brand</th>
                                            @can('isAdmin')
                                            <th>Status</th>
                                            <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $value)
                                        <tr>
                                            <td>
                                                {{$value->title}}
                                            </td>
                                            <!--<td>-->
                                            <!--    {{$value->type}}-->
                                            <!--</td>-->
                                            <td>
                                                @if ($value->image)
                                                <img src="{{ asset('images/presentation/'.$value->image) }}"
                                                    alt="{{$value->title}}" width="50px">
                                                @endif
                                            </td>
                                            <td>
                                                {{$value->brandName}}
                                            </td>
                                            @can('isAdmin')
                                            <td>
                                                @if ($value->status)
                                                <a href="{{ url('admin/presentation/status/'.$value->id) }}"
                                                    class="btn btn-success">Active</a>
                                                @else
                                                <a href="{{ url('admin/presentation/status/'.$value->id) }}"
                                                    class="btn btn-danger">Inactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <i class="bi bi-three-dots-vertical" style="cursor:pointer"
                                                        data-toggle="dropdown" aria-expanded="false"></i>
                                                    <ul class="dropdown-menu" x-placement="bottom-start">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/presentation/edit/'.$value->id) }}">
                                                                <i class="bi bi-pencil-square"></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item"
                                                                data-toggle="modal"
                                                                data-target="#presentation-modal{{$value->id }}">
                                                                <i class="bi bi-trash"></i>
                                                                Remove
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            @endcan
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="presentation-modal{{$value->id }}"
                                            style="display: none;" aria-hidden="true">
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
                                                            href="{{ url('admin/presentation/delete/'.$value->id) }}"
                                                            class="btn btn-primary">
                                                            Ok</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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