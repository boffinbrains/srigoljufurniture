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
                            <a href="{{ url('admin/bank/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="bank_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="title">Bank Name*</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="name">Account Name*</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="number">Account Number*</label>
                                        <input type="tel" class="form-control" id="number" name="number">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="ifsc_code">IFSC Code*</label>
                                        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="bank_form_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    const bank_form_data = [{
            id: 'title',
            type: 'text',
            message: 'Bank Name Required',
        },
        {
            id: 'name',
            type: 'text',
            message: 'Account Name Required',
        },
        {
            id: 'number',
            type: 'tel',
            message: 'Account Number Required',
        },
        {
            id: 'ifsc_code',
            type: 'text',
            message: 'IFSC Code Required',
        },
    ];
    validator('#bank_form', '#bank_form_btn', "{{ url('admin/bank/create') }}", bank_form_data);
});
</script>
@endsection