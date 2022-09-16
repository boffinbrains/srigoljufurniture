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
                            <a href="{{ url('admin/customer/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="customer_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="company">Company*</label>
                                        <input type="text" class="form-control" id="company" name="company">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person*</label>
                                        <input type="text" class="form-control" id="contact_person"
                                            name="contact_person">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number*</label>
                                        <input type="tel" class="form-control" id="mobile_number" name="mobile_number">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="address">Address*</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="contact_person_address">Personal Address</label>
                                        <input type="text" class="form-control" id="contact_person_address"
                                            name="contact_person_address">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <input type="text" class="form-control" id="birthday" name="birthday">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="anniversary">Anniversary</label>
                                        <input type="text" class="form-control" id="anniversary" name="anniversary">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="profession">Profession</label>
                                        <input type="text" class="form-control" id="profession" name="profession">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="customer_form_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    const customer_form_data = [{
            id: 'company',
            type: 'text',
            message: 'Company Required',
        },
        {
            id: 'contact_person',
            type: 'text',
            message: 'Contact Person Required',
        },
        {
            id: 'phone_number',
            type: 'tel',
            message: 'Phone Number Required',
            required: false
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
            required: false
        },
        {
            id: 'address',
            type: 'text',
            message: 'Address Required',
        },
        {
            id: 'contact_person_address',
            type: 'text',
            message: 'contact_person_address Required',
            required: false
        },
        {
            id: 'birthday',
            type: 'text',
            message: 'birthday Required',
            required: false
        },
        {
            id: 'anniversary',
            type: 'text',
            message: 'anniversary Required',
            required: false
        },
        {
            id: 'profession',
            type: 'text',
            message: 'profession Required',
            required: false
        },
    ];
    validator('#customer_form', '#customer_form_btn', "{{ url('admin/customer/create') }}", customer_form_data);
});
</script>
@endsection