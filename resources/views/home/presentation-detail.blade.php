@extends('home.presentation-layout.index')
@section('body')
    <style>
        .table-responsive > table{
            width: 100% !important;
        }
    </style>
    <section class="container-fluid py-2">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="mb-lg-0 mb-md-4 mb-sm-4 mb-4 text-left">
                    <img src="{{ asset('images/brand/' . get_brand_image($product->brand)) }}"
                        alt="{{ get_brand_name($product->brand) }}" height="70">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="mb-lg-0 mb-md-4 mb-sm-4 mb-4 text-right">
                    <img src="{{ asset('home/images/sri-golju-furniture-industries-logo.png') }}"
                        alt="Sri Golju Furniture Industries" width="300">
                </div>
            </div>
        </div>
    </section>
    <article class="py-3" style="background: #fc4f13;">
        <section class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 mb-3">
                    <h1 class="text-white">
                        {{ $product->title }}
                    </h1>
                    <div clas="p-3">
                        @isset($images)
                            @if (count($images) > 0)
                                <section class="d-flex">
                                    <div id="gallery" class="w-100 carousel slide" data-ride="carousel">
                                        <div class="carousel-inner rounded">
                                            @foreach ($images as $key => $item)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('images/gallery/' . $item->path) }}"
                                                        alt="{{ $item->title }}" class="img-fluid"
                                                        style="aspect-ratio:16/9">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
                                            <i class="bi bi-arrow-left-circle-fill h2"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
                                            <i class="bi bi-arrow-right-circle-fill h2"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </section>
                                @else
                                <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->title }}"
                                    class="img-fluid">
                            @endif
                        @endisset
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="d-none">
                        <p class="text-muted h4">
                            Contact Number :
                        </p>
                        <p class="m-0 h5">
                            {{ $product->brief_description }}
                        </p>
                    </div>
                    <h1 class="text-white">
                        Specifications
                    </h1>
                    <div class="table-responsive">
                    {!! $product->product_specification !!}
                    </div>
                    @if($product->color)
                        <div class="mt-3 card">
                            <div class="card-body">
                                <h4>
                                    Colors Available:
                                </h4>
                                <div class="d-flex flex-wrap">
                                    @php
                                        $array = explode(',',$product->color);
                                    @endphp
                                    @if(count($array)>0)
                                        @foreach($array as $color)
                                            <div class="mr-2" style="width:30px;height:30px;border-radius:50%;background-color:{{ $color }}"></div>
                                        @endforeach
                                    @endif    
                                </div>
                            </div>
                        </div>
                    @endif
                    {!! $product->care_instructions !!}
                </div>
            </div>
        </section>
    </article>
@endsection
