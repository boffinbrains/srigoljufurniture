@extends('layouts.home.index')
@section('body')

<section class="container-fluid py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3 d-flex align-items-center justify-content-center">
            <div>
                <span class="display-4 font-weight-bold">Download Our Catalogues</span>
                <p class="text-muted mt-2">We have a vast range of good quality furniture</p>
                <div class="d-flex flex-lg-row flex-md-row flex-sm-column flex-column flex-wrap">
                    @foreach ($data as $pdf)
                    <a class="download_btn mr-4 my-3"
                        href="{{asset('catalogue/'.$pdf->pdf)}}">{{$pdf->title}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3" style="max-height: 80vh;">
            <img src="{{asset('home/images/download-page-artwork.svg')}}" class="img-fluid h-100" alt="">
        </div>
    </div>
</section>

@endsection