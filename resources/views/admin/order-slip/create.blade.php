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
                            <a href="{{ url('admin/order-slip/list') }}" class="btn btn-tool">
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
                                                    <form id="order_slip_form" enctype="multipart/form-data"
                                                        autocomplete="off" novalidate>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="order_number">Order No.*</label>
                                                                <input type="text" class="form-control"
                                                                    id="order_number" name="order_number" disabled
                                                                    readonly value="{{$order_number}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="added_date">Date*</label>
                                                                <input type="date" class="form-control" id="added_date"
                                                                    name="added_date">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="customer_name">Customer Name*</label>
                                                                <input type="text" class="form-control"
                                                                    id="customer_name" name="customer_name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="customer_number">Customer Number*</label>
                                                                <input type="tel" class="form-control"
                                                                    id="customer_number" name="customer_number" maxlength="10">
                                                                <small class="text-danger numCheck">
                                                                    Mobile Number should be of 10 digits.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary"
                                                                id="order_slip_form_btn">Next</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Items -->
                                                <div id="items" class="content" role="tabpanel"
                                                    aria-labelledby="items-trigger">
                                                    <form id="order_slip_items_form" enctype="multipart/form-data"
                                                        autocomplete="off" novalidate>
                                                        <div class="container-fluid">
                                                            <div class="py-3 text-right">
                                                                <button class="btn btn-primary"
                                                                    id="order_slip_items_form_btn">Save</button>
                                                            </div>
                                                            <div style="overflow:auto">
                                                                <table name="saveorder_slip" id="example1"
                                                                    class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Image</th>
                                                                            <th>Description</th>
                                                                            <!--<th>Width</th>-->
                                                                            <!--<th>Height</th>-->
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
                                                                                    class="form-control target item_name"
                                                                                    name="item_name"
                                                                                    id="item_name">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file"
                                                                                    class="form-control target item_image h-100 text-truncate"
                                                                                    name="item_image"
                                                                                    accept=".jpg, .png"
                                                                                    id="item_image">
                                                                                <div class="progress mb-3">
                                                                                    <div class="progress-bar bg-success"
                                                                                        role="progressbar"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100"
                                                                                        style="transition:none">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="progress-res"></div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                    class="form-control fabric target"
                                                                                    name="fabric" id="fabric">
                                                                                <!--<textarea class="form-control fabric"-->
                                                                                <!--    name="fabric" id="fabric"></textarea>-->
                                                                            </td>
                                                                            <!--<td>-->
                                                                            <!--    <input type="hidden"-->
                                                                            <!--        class="form-control width"-->
                                                                            <!--        name="width" id="width" value="0">-->
                                                                            <!--</td>-->
                                                                            <!--<td>-->
                                                                            <!--    <input type="hidden"-->
                                                                            <!--        class="form-control height"-->
                                                                            <!--        name="height" id="height" value="0">-->
                                                                            <!--</td>-->
                                                                            <td>
                                                                                 <input type="hidden"
                                                                                    class="form-control width"
                                                                                    name="width" id="width" value="0">
                                                                                    <input type="hidden"
                                                                                    class="form-control height"
                                                                                    name="height" id="height" value="0">
                                                                                <button
                                                                                    class="btn btn-danger row-remove"
                                                                                    disabled>
                                                                                    <i class="bi bi-x"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
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
<script>
// Discount Type
$(document).ready(function() {
    //Calc....
    function autoCalcSetup() {
        $('form#order_slip_items_form').jAutoCalc('destroy');
        $('form#order_slip_items_form tr.line_items').jAutoCalc({
            keyEventsFire: true,
            decimalPlaces: 2,
            emptyAsZero: true
        });
        $('form#order_slip_items_form').jAutoCalc({
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
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    // BS Stepper
    var newDate = new Date();
    var dd = newDate.getDate();
    var MM = newDate.getMonth() + 1;
    MM = MM < 10 ? '0' + MM : MM;
    var yyyy = newDate.getFullYear();
    var date = yyyy + "-" + (MM) + "-" + dd;
    $('input[type=date]').val(date);
    // Set Current Date
    $('#discount_type').on('change', function() {
        if ($('#discount_type').val() === 'all') {
            $('#discount').attr('readonly', false);
        } else if ($('#discount_type').val() === 'individual') {
            $('#discount').attr('readonly', true);
        }
    });
    const order_slip_form_data = [{
            id: 'order_number',
            type: 'text',
            message: 'Order Number Required',
        },
        {
            id: 'added_date',
            type: 'text',
            message: 'Date Required',
        },
        {
            id: 'customer_name',
            type: 'text',
            message: 'Customer Name Required',
        },
        {
            id: 'customer_number',
            type: 'text',
            message: 'Customer Number Required',
        },
    ];
    validator('#order_slip_form', '#order_slip_form_btn', "{{ url('admin/order-slip/create') }}",
        order_slip_form_data);

    // order_slip Items - !!!Mendatery Field Must be first
    const order_slip_items_form_data = [{
            id: 'item_name',
            type: 'text',
            message: 'Item Name Required',
        },
        {
            id: 'item_image',
            type: 'file',
            message: 'Item Image Required',
            required: false
        },
        {
            id: 'width',
            type: 'text',
            message: 'Width Required',
        },
        {
            id: 'height',
            type: 'text',
            message: 'Height Required',
        },
        {
            id: 'fabric',
            type: 'text',
            message: 'Fabric Required',
        },
    ];
    validator('#order_slip_items_form', '#order_slip_items_form_btn',
        "{{ url('admin/order-slip/createItems') }}",
        order_slip_items_form_data, null, true);
});

// order_slip Items Image Upload
$('.item_image').on('change', function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).siblings('.progress').show();
    $(this).siblings('.progress-res').text('');
    $(this).siblings('.progress').find('.progress-bar').width('0');
    var item_image = this.files[0];
    var fd = new FormData();
    fd.append('image', item_image);
    $.ajax({
        type: 'post',
        context: this,
        data: fd,
        contentType: false,
        processData: false,
        url: "{{ url('admin/order-slip/imageUpload') }}",
        success: function(data) {
            if (data == 0) {
                $(this).siblings('.progress').find('.progress-bar').width('0');
                $(this).siblings('.progress-res').text('Image Not Uploaded').css('color',
                    'red');
            } else {
                $(this).siblings('.progress').find('.progress-bar').animate({
                    width: "100%"
                }, 1000);
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