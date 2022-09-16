@extends('home.presentation-layout.index')
@section('body')
    @IncludeIf('home.presentation-layout.header')

    @isset($data)
        @if (count($data) > 0)
            <section class="py-lg-4 py-md-4 py-sm-3 py-3">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($data as $product)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 position-relative">
                                <div class="shadow rounded mb-4">
                                    <figure class="text-center overflow-hidden" style="aspect-ratio: 16/9;">
                                        <a href="{{ url('presentation/' . $product->slug) }}">
                                            <img src="{{ asset('images/product/' . $product->image) }}"
                                                alt="{{ $product->title }}" class="img-fluid">
                                        </a>
                                    </figure>
                                    <div class="p-3 text-center">
                                        <a href="{{ url('presentation/' . $product->slug) }}">
                                            <h2>
                                                {{ $product->title }}
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
        <h1 class="text-center mt-3">
            No Result Found!
        </h1>
        @endif
    @endisset
@endsection
