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
                                <a href="{{ url('admin/product/list') }}" class="btn btn-tool">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                        <form id="product_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                            <div class="container-fluid p-4">
                                <div class="card card-primary card-outline card-outline-tabs">
                                    <div class="card-header p-0 border-bottom-0">
                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="core-values-tab" data-toggle="pill"
                                                    href="#core-values" role="tab" aria-controls="core-values"
                                                    aria-selected="false">SEO</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade active show" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="title">Title*</label>
                                                                    <input type="text" class="form-control" id="title"
                                                                        name="title" value="{{ $data->title }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="slug">Slug*</label>
                                                                    <input type="text" class="form-control" id="slug"
                                                                        name="slug" value="{{ $data->slug }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Category*</label>
                                                                    <select class="form-control select2bs4" name="category"
                                                                        id="category" style="width: 100%;">
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                {{ $data->category_id == $category->id ? 'selected' : '' }}>
                                                                                {{ $category->title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Brand*</label>
                                                                    <select class="form-control select2bs4" name="brand"
                                                                        id="brand" style="width: 100%;">
                                                                        @foreach ($brands as $brand)
                                                                            <option value="{{ $brand->id }}"
                                                                                {{ $data->brand == $brand->id ? 'selected' : '' }}>
                                                                                {{ $brand->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="brief_description">Brief Description</label>
                                                                    <input type="text" class="form-control"
                                                                        id="brief_description" name="brief_description"
                                                                        value="{{ $data->brief_description }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="featured">Featured*</label>
                                                                    <select name="featured" id="featured"
                                                                        class="form-control">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0"
                                                                            {{ $data->featured == 0 ? 'selected' : '' }}>
                                                                            No
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <!--<div class="form-group">-->
                                                                <!--    <label for="color">Color</label>-->
                                                                <!--    <input type="text" class="form-control" id="color"-->
                                                                <!--        name="color" value="{{ $data->color }}">-->
                                                                <!--</div>-->
                                                                @php
                                                                    $array = explode(",",$data->color);
                                                                @endphp
                                                                <div class="form-group">
                                                                    <label>Color</label>
                                                                    <select class="select2bs4" name="color" id="color" multiple="multiple" data-placeholder="Choose Color"
                                                                        style="width: 100%;">
                                                                        <option value="#9400D3" {{ in_array('#9400D3', $array) ? 'selected' : '' }}>Violet</option>
                                                                        <option value="#4B0082" {{ in_array('#4B0082', $array) ? 'selected' : '' }}>Indigo</option>
                                                                        <option value="#0000FF" {{ in_array('#0000FF', $array) ? 'selected' : '' }}>Blue</option>
                                                                        <option value="#00FF00" {{ in_array('#00FF00', $array) ? 'selected' : '' }}>Green</option>
                                                                        <option value="#FFFF00" {{ in_array('#FFFF00', $array) ? 'selected' : '' }}>Yellow</option>
                                                                        <option value="#FF7F00" {{ in_array('#FF7F00', $array) ? 'selected' : '' }}>Orange</option>
                                                                        <option value="#FF0000" {{ in_array('#FF0000', $array) ? 'selected' : '' }}>Red</option>
                                                                        <option value="#964B00" {{ in_array('#964B00', $array) ? 'selected' : '' }}>Brown</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="discount">Discount(%)</label>
                                                                    <input type="tel" class="form-control" id="discount"
                                                                        name="discount" minlength="0" maxlength="2"
                                                                        value="{{ $data->discount }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="presentation">Presentation</label>
                                                                    <select name="presentation" id="presentation"
                                                                        class="form-control">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0"
                                                                            {{ $data->presentation == 0 ? 'selected' : '' }}>
                                                                            No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="image">Image*</label>
                                                                    <div class="input-group">
                                                                        <input type="file"
                                                                            class="form-control-file p-2 rounded"
                                                                            style="border:1px solid #ced4da" id="image"
                                                                            name="image" onchange="previewFile(this)"
                                                                            accept="image/jpg,image/png,image/jpeg,image/gif">
                                                                    </div>
                                                                </div>
                                                                <img width="100px" class="my-3"
                                                                    src="{{ asset('images/product/' . $data->image) }}"
                                                                    alt="{{ $data->title }}">
                                                            </div>
                                                            <!--<div class="col-lg-6 col-md-12 col-sm-12 col-12">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="thumbnail">Thumbnail</label>-->
                                                            <!--        <div class="input-group">-->
                                                            <!--            <input type="file" class="form-control-file p-2 rounded"-->
                                                            <!--                style="border:1px solid #ced4da" id="thumbnail" name="thumbnail"-->
                                                            <!--                onchange="previewFile(this)"-->
                                                            <!--                accept="image/jpg,image/png,image/jpeg,image/gif">-->
                                                            <!--        </div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="w-100">
                                                            <div class="form-group">
                                                                <label>Product Specification</label>
                                                                <textarea class="form-control" id="product_specification"
                                                                    name="product_specification">{!! $data->product_specification !!}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="w-100">
                                                            <div class="form-group">
                                                                <label>Care Instructions</label>
                                                                <textarea class="form-control" id="care_instructions"
                                                                    name="care_instructions">{!! $data->care_instructions !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="core-values" role="tabpanel"
                                                aria-labelledby="core-values-tab">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="meta_title">Meta Title</label>
                                                            <input type="text" class="form-control" id="meta_title"
                                                                name="meta_title" value="{{ $data->meta_title }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="canonical">Canonical</label>
                                                            <input type="text" class="form-control" id="canonical"
                                                                name="canonical" value="{{ $data->canonical }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="meta_description">Meta Description</label>
                                                            <textarea class="form-control" id="meta_description"
                                                                name="meta_description"
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
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" id="product_form_btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/js/summernote-bs4.min.js') }}"></script>
    <!-- CheckBox -->
    <script src="{{ asset('adminlte/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#product_specification').summernote({
                'height': 150
            })
            $('#care_instructions').summernote({
                'height': 150
            })
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
            $('#title').on('keyup', function() {
                var value = $('#title').val();
                $('#slug').val(value.replace(/\s+/g, '-').toLowerCase());
            })
            const product_form_data = [{
                    id: 'title',
                    type: 'text',
                    message: 'Title Required',
                },
                {
                    id: 'product_specification',
                    type: 'text',
                    required: false
                },
                {
                    id: 'care_instructions',
                    type: 'text',
                    required: false
                },
                {
                    id: 'slug',
                    type: 'text',
                    message: 'Slug Required',
                },
                {
                    id: 'presentation',
                    type: 'text',
                    required: false
                },
                {
                    id: 'category',
                    type: 'text',
                    message: 'Choose Category',
                },
                {
                    id: 'brand',
                    type: 'text',
                    message: 'Choose Brand',
                    required: false
                },
                {
                    id: 'color',
                    type: 'text',
                    required: false
                },
                {
                    id: 'discount',
                    type: 'tel',
                    required: false
                },
                {
                    id: 'image',
                    type: 'file',
                    message: 'Image Required',
                    required: false
                },
                {
                    id: 'brief_description',
                    type: 'text',
                    required: false
                },
                {
                    id: 'featured',
                    type: 'text',
                    message: 'Choose Yes or No',
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
            validator('#product_form', '#product_form_btn', "{{ url('admin/product/update') }}",
                product_form_data, id = "{{ $data->id }}");
        });
    </script>
@endsection
