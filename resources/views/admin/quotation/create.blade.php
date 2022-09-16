@extends('admin.commons.index')
@section('content')
<link rel="stylesheet" href="{{ asset('adminlte/css/bs-stepper.min.css') }}">
<!-- BS Stepper -->
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
                            <a href="{{ url('admin/quotation/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="container-fluid p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-default">
                                    <div class="card-body p-0">
                                        <div class="bs-stepper">
                                            <div class="bs-stepper-header" role="tablist">
                                                <!-- Steppers -->
                                                <div class="step" data-target="#details">
                                                    <button type="button" class="step-trigger" role="tab"
                                                        aria-controls="details" id="details-trigger">
                                                        <span class="bs-stepper-circle">1</span>
                                                        <span class="bs-stepper-label">Fill Details</span>
                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#items">
                                                    <button type="button" class="step-trigger" role="tab"
                                                        aria-controls="items" id="items-trigger">
                                                        <span class="bs-stepper-circle">2</span>
                                                        <span class="bs-stepper-label">Add Items</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content">
                                                <!-- Details -->
                                                <div id="details" class="content" role="tabpanel"
                                                    aria-labelledby="details-trigger">
                                                    <form id="quotation_form" enctype="multipart/form-data"
                                                        autocomplete="off" novalidate>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Reference No.*</label>
                                                                    <input type="text" class="form-control"
                                                                        id="reference_number" name="reference_number"
                                                                        disabled readonly value="{{$reference_number}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Date*</label>
                                                                    <input type="date" class="form-control"
                                                                        id="added_date" name="added_date">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Client Name*</label>
                                                                    <input type="text" class="form-control"
                                                                        id="client_name" name="client_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Price Type*</label>
                                                                    <select class="form-control" id="price_type"
                                                                        name="price_type">
                                                                        <option value="mrp">M.R.P</option>
                                                                        <option value="price">Price</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Select Bank*</label>
                                                                    <select class="form-control" id="bank_id"
                                                                        name="bank_id">
                                                                        @foreach ($banks as $bank)
                                                                        <option value="{{$bank->id}}">{{$bank->title}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Discount Type*</label>
                                                                    <select class="form-control" id="discount_type"
                                                                        name="discount_type">
                                                                        <option value="individual">Individual</option>
                                                                        <option value="all">All</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Discount</label>
                                                                    <input type="tel" class="form-control" id="discount"
                                                                        name="discount" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Sector*</label>
                                                                    <select class="form-control" id="sector"
                                                                        name="sector">
                                                                        <option value="non-government">Non-Government
                                                                        </option>
                                                                        <option value="government">Government</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Terms &
                                                                        Conditions</label>
                                                                    <textarea class="form-control"
                                                                        id="terms_and_conditions"
                                                                        name="terms_and_conditions">
                                                                        {!! $terms_and_conditions !!}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary"
                                                            id="quotation_form_btn">Next</button>
                                                    </form>
                                                </div>
                                                <!-- Items -->
                                                <div id="items" class="content" role="tabpanel"
                                                    aria-labelledby="items-trigger">
                                                    <form id="quotation_items_form" enctype="multipart/form-data"
                                                        autocomplete="off" novalidate>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                    <div class="form-group">
                                                                        <label>Total</label>
                                                                        <input type="text"
                                                                            class="form-control sub_total"
                                                                            name="sub_total" value=""
                                                                            jAutoCalc="SUM({item_total})" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                    <div class="py-3 text-right">
                                                                        <button class="btn btn-primary"
                                                                            id="quotation_items_form_btn">Add Items to
                                                                            Quotation</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="overflow:auto">
                                                                <table name="saveQuotation" id="example1"
                                                                    class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Image</th>
                                                                            <th>Description</th>
                                                                            <th>Color</th>
                                                                            <th>Quantity</th>
                                                                            <th>M.R.P</th>
                                                                            <th>Discount(%)</th>
                                                                            <th>Rate</th>
                                                                            <th>Total</th>
                                                                            <th>
                                                                                <button class="row-add btn btn-primary">
                                                                                    <i class="bi bi-plus"></i>
                                                                                </button>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="line_items">
                                                                            <td>
                                                                                <input type="text"
                                                                                    class="form-control target product_name"
                                                                                    name="product_name">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file"
                                                                                    class="form-control target img_file h-100 text-truncate"
                                                                                    name="img_file" accept=".jpg, .png">
                                                                                <div class="progress mb-3">
                                                                                    <div class="progress-bar bg-success"
                                                                                        role="progressbar"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100"
                                                                                        style="transition:none">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="progress-res"></div>
                                                                                <input type="hidden" name="product_img"
                                                                                    class="product_img">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="product_desc"
                                                                                    class="form-control target product_desc">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    class="form-control target color"
                                                                                    name="color">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="qty" value="1"
                                                                                    class="form-control input-num target qty">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="price"
                                                                                    class="form-control input-num target price">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    class="form-control target item_discount"
                                                                                    name="item_discount">
                                                                                <input type="hidden" name="hundred"
                                                                                    value="100">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    class="form-control target rate"
                                                                                    name="rate"
                                                                                    jAutoCalc="{price}-{price}*{item_discount}/{hundred}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="item_total"
                                                                                    value="" jAutoCalc="{qty} * {rate}"
                                                                                    class="form-control input-num target item_total">
                                                                                <input type="hidden" name="total"
                                                                                    value="" jAutoCalc="{price}*{qty}"
                                                                                    class="form-control target total">
                                                                            </td>
                                                                            <td>
                                                                                <button
                                                                                    class="btn btn-danger row-remove"
                                                                                    disabled>
                                                                                    <i class="bi bi-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfooter>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Image</th>
                                                                            <th>Description</th>
                                                                            <th>Color</th>
                                                                            <th>Quantity</th>
                                                                            <th class="toggle_label">M.R.P</th>
                                                                            <th>Discount(%)</th>
                                                                            <th>Rate</th>
                                                                            <th>Total</th>
                                                                            <th>
                                                                                <button class="row-add btn btn-primary">
                                                                                    <i class="bi bi-plus"></i>
                                                                                </button>
                                                                            </th>
                                                                        </tr>
                                                                    </tfooter>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('adminlte/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminlte/js/jautocalc.min.js') }}"></script>
<script src="{{ asset('adminlte/js/bs-stepper.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/js/summernote-bs4.min.js') }}"></script>
<script>
// Discount Type
$(document).ready(function() {
    //Calc....
    function autoCalcSetup() {
        $('form#quotation_items_form').jAutoCalc('destroy');
        $('form#quotation_items_form tr.line_items').jAutoCalc({
            keyEventsFire: true,
            decimalPlaces: 2,
            emptyAsZero: true
        });
        $('form#quotation_items_form').jAutoCalc({
            decimalPlaces: 2
        });
    }
    autoCalcSetup();

    $('button.row-remove').on("click", function(e) {
        e.preventDefault();

        var form = $(this).parents('form')
        $(this).parents('tr').remove();
        autoCalcSetup();
        if ($('.line_items').length == 1) {
            $('.row-remove').attr('disabled', true);
        }
    });

    $('button.row-add').on("click", function(e) {
        e.preventDefault();
        var $table = $(this).parents('table');
        var $bottom = $table.find('tr.line_items').last();
        var $new = $bottom.clone(true);

        $new.jAutoCalc('destroy');
        $new.insertAfter($bottom);
        $new.find('.target').val('');
        $new.find('.qty').val('1');
        autoCalcSetup();

        if ($('.line_items').length > 1) {
            $('.row-remove').attr('disabled', false);
        }
        $new.find('.progress-res').text('');
    });
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
    // INput Type Select
    $('#terms_and_conditions').summernote({
        'height': 110
    })
    // Summernote
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    // BS Stepper
    $('#discount_type').on('change', function() {
        if ($('#discount_type').val() === 'all') {
            $('#discount').attr('readonly', false);
            $('.item_discount').attr('readonly', true);
        } else if ($('#discount_type').val() === 'individual') {
            $('#discount').attr('readonly', true);
            $('.item_discount').attr('readonly', false);
        }
    });
    const quotation_form_data = [{
            id: 'reference_number',
            type: 'text',
            message: 'Reference Number Required',
        },
        {
            id: 'added_date',
            type: 'date',
            message: 'Date Required',
        },
        {
            id: 'client_name',
            type: 'text',
            message: 'Client Name Required',
        },
        {
            id: 'price_type',
            type: 'text',
            message: 'Price Type Required',
        },
        {
            id: 'bank_id',
            type: 'text',
            message: 'Bank Required',
        },
        {
            id: 'discount_type',
            type: 'text',
            message: 'Discount Type Required',
        },
        {
            id: 'discount',
            type: 'tel',
            message: 'Discount Required',
            required: false
        },
        {
            id: 'sector',
            type: 'text',
            message: 'Sector Required',
        },
        {
            id: 'terms_and_conditions',
            type: 'text',
            message: 'Terms and Conditions Required',
            required: false
        },
    ];
    validator('#quotation_form', '#quotation_form_btn', "{{ url('admin/quotation/create') }}",
        quotation_form_data);

    // Quotation Items - !!!Mendatery Field Must be first
    const quotation_items_form_data = [{
            id: 'product_name',
            type: 'text',
            message: 'Product Name Required',
        },
        {
            id: 'product_img',
            type: 'text',
            message: 'Product Image Required',
            required: false
        },
        {
            id: 'product_desc',
            type: 'text',
            message: 'Product Description Required',
            required: false
        },
        {
            id: 'color',
            type: 'text',
            message: 'Color Required',
            required: false
        },
        {
            id: 'qty',
            type: 'tel',
            message: 'Quantity Required',
        },
        {
            id: 'price',
            type: 'tel',
            message: 'Price Required',
        },
        {
            id: 'item_discount',
            type: 'tel',
            message: 'Discount Required',
            required: false
        },
        {
            id: 'rate',
            type: 'text',
            message: 'Rate Required',
        },
        {
            id: 'item_total',
            type: 'text',
            message: 'Item Total Required',
        },
        {
            id: 'sub_total',
            type: 'text',
            message: 'Sub Total Required',
        }
    ];
    validator('#quotation_items_form', '#quotation_items_form_btn', "{{ url('admin/quotation/createItems') }}",
        quotation_items_form_data, null, true);
});

// Quotation Items Image Upload
$('.img_file').on('change', function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).siblings('.progress').show();
    $(this).siblings('.progress-res').text('');
    $(this).siblings('.progress').find('.progress-bar').width('0');
    var product_img = this.files[0];
    var fd = new FormData();
    fd.append('image', product_img);
    $.ajax({
        type: 'post',
        context: this,
        data: fd,
        contentType: false,
        processData: false,
        url: "{{ url('admin/quotation/imageUpload') }}",
        success: function(data) {
            if (!data) {
                $(this).siblings('.progress').find('.progress-bar').width('0');
                $(this).siblings('.progress-res').text('Image Not Uploaded').css('color',
                    'red');
            } else {
                $(this).siblings('.progress').find('.progress-bar').animate({
                    width: "100%"
                }, 1000);
                $(this).siblings('.product_img').val(data);
                setTimeout(() => {
                    $(this).siblings('.progress').hide();
                    $(this).siblings('.progress-res').text('Image Uploaded').css(
                        'color',
                        'green');
                }, 2500);
            }
        }
    })
})
</script>
@endsection