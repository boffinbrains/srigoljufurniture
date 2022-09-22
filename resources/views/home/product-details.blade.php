@extends('layouts.home.index')
@section('body')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        #social-links ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        div#social-links ul li a {
            font-size: 3rem;
            color: #222;
        }
    </style>
    <article class="py-lg-4 py-md-4 py-sm-3 py-3">
        <div class="container-fluid mb-5">
            <p class="p-3 text-info font-weight-bold">
                <a href="{{ url('/') }}">Home</a> / <a href="{{ url($category->slug) }}">{{ $category->title }}</a> /
                {{ $product->title }}
            </p>
        </div>
        <section class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div clas="p-3">
                        <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->title }}"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="product_list_wrapper">
                        <div class="d-flex justify-content-between">
                            <h1 style="width:50%">
                                {{ $product->title }}
                            </h1>
                            @isset($product->discount)
                                <div style="width:50%" class="text-right">
                                    <span class="p-2 alert text-white"
                                        style="background:linear-gradient(45deg, #d72519, #ff4b22)">
                                        {{ $product->discount }}% OFF
                                    </span>
                                </div>
                            @endisset
                        </div>
                        <h4>
                            Brand: {{ get_brand_name($product->brand) }}
                        </h4>
                        <p class="mb-3">
                            {{ $product->brief_description }}
                        </p>
                        @if ($product->color)
                            <div class="mb-3">
                                <h4>
                                    Available Colors:
                                </h4>
                                <div class="d-flex flex-wrap">
                                    @php
                                        $array = explode(',', $product->color);
                                    @endphp
                                    @if (count($array) > 0)
                                        @foreach ($array as $color)
                                            <div class="mr-2"
                                                style="width:30px;height:30px;border-radius:50%;background-color:{{ $color }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                        <p>
                            {!! $product->product_specification !!}
                        </p>
                        <p>
                            {!! $product->care_instructions !!}
                        </p>
                        <button class="btn_primary px-4 py-2 mb-3" data-toggle="modal" data-target="#quote_form"
                            onclick="$('input[name=product_name]').val('{{ $product->title }}')">
                            Request Quote
                        </button>
                        <h3>Share on social media</h3>
                        {!! $shareButtons !!}
                    </div>
                </div>
            </div>
        </section>
    </article>
    <!-- Modal -->
    <div class="modal fade" id="quote_form" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    @include('home.includes.enquiry-form')
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection
