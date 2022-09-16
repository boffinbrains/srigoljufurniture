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
                            <a href="{{ url('admin/testimonial/list') }}" class="btn btn-tool">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form id="testimonial_form" enctype="multipart/form-data" autocomplete="off" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="toggle">Type</label>
                                <select name="toggle" id="toggle" class="form-control">
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                            <div class="form-group video-toggle" style="display:none">
                                <label for="video">Video Link</label>
                                <input type="text" class="form-control" id="video" name="video">
                            </div>
                            <div class="form-group image-toggle">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <input type="file" class="form-control-file p-2 rounded"
                                        style="border:1px solid #ced4da" id="image" name="image"
                                        onchange="previewFile(this)" accept="image/jpg,image/png,image/jpeg,image/gif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="review">Review*</label>
                                <textarea class="form-control" id="review" rows="7" name="review"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="testimonial_form_btn">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    const about_form_data = [{
            id: 'name',
            type: 'text',
            message: 'Name Required',
        },
        {
            id: 'image',
            type: 'file',
            message: 'Image Required',
            required: false
        },
        {
            id: 'video',
            type: 'text',
            required: false
        },
        {
            id: 'review',
            type: 'text',
            message: 'Review Required',
        },
    ];
    validator('#testimonial_form', '#testimonial_form_btn', "{{ url('admin/testimonial/create') }}",
        about_form_data);
});
$('#toggle').on('change', function(){
    if($('#toggle').val() == 'image'){
        $('#video').val('');
        $('.image-toggle').show();
        $('.video-toggle').hide();
    }else{
        $('#image').val('');
        $('#preview').remove();
        $('.image-toggle').hide();
        $('.video-toggle').show();
    }
})
</script>
@endsection