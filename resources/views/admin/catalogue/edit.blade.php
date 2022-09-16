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
                            <a href="{{ url('admin/catalogue/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="catalogue_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="title">Title*</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $data->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="pdf">Pdf* 
                                        @if(isset($data->pdf))
                                         
                                            @php $image = public_path('catalogue/'.$data->pdf); @endphp
                                            @if(file_exists($image))
                                            <a href="{{ asset('catalogue/'.$data->pdf) }}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                            @endif
                                         
                                        @endif</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control-file p-2 rounded"
                                                style="border:1px solid #ced4da" id="pdf" name="pdf"
                                                accept="application/pdf">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            value="{{ $data->meta_title }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="canonical">Canonical</label>
                                        <input type="text" class="form-control" id="canonical" name="canonical"
                                            value="{{ $data->canonical }}">
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
                            <button class="btn btn-primary" id="catalogue_form_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    const category_form_data = [{
            id: 'title',
            type: 'text',
            message: 'Title Required',
        },
        {
            id: 'pdf',
            type: 'file',
            message: 'Pdf Required',
            required: true
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
    validator('#catalogue_form', '#catalogue_form_btn', "{{ url('admin/catalogue/update') }}",
        category_form_data, id = "{{$data->id}}");
});
</script>
@endsection