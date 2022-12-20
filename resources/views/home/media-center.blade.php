@extends('layouts.home.index')
@section('body')

{{-- Events List --}}
@foreach ($data as $gallery)
<section class="container py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="heading">
        <h2 class="display-4 font-weight-bold">
            Media Gallery
        </h2>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <div class="shadow p-3 rounded">
                <div class="media_wrapper popup-gallery">
                    <a href="{{ asset('images/gallery/'.$gallery->image) }}">
                        <img src="{{ asset('images/gallery/'.$gallery->image) }}" class="img-fluid" alt="{{ $gallery->title }}">
                    </a>
                    @foreach ($images as $image)
                    @if ($image->gallery_id == $gallery->id)
                    <a class="d-none" href="{{asset('images/gallery/'.$image->path)}}">
                        <img src="{{asset('images/gallery/'.$image->path)}}" alt="{{$image->title}}" class="img-fluid">
                    </a>
                    @endif
                    @endforeach
                </div>
                <h4 class="font-weight-bold text-center mt-3">
                    {{$gallery->title}}
                </h4>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }
    });
});
</script>
@endforeach
@endsection