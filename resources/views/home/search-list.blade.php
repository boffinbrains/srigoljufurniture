@extends('layouts.home.index')
@section('body')
    @if (count($data) > 0)
        <section class="bg_color py-lg-4 py-md-4 py-sm-3 py-3">
            <div class="heading">
                <h2 class="display-4 m-0">
                    Search Results
                </h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($data as $product)
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3 position-relative">
                            <div class="product_list_wrapper rounded">
                                @isset($product->discount)
                                    <div class="sale_sticker"
                                        style="background-image: url('{{ asset('images/sticker-bg.svg') }}');background-repeat:no-repeat;">
                                        <span>
                                            {{ $product->discount }}% OFF
                                        </span>
                                    </div>
                                @endisset
                                <figure>
                                    <a href="{{ url($product->slug) }}">
                                        <img src="{{ asset('images/product/' . $product->image) }}"
                                            alt="{{ $product->title }}">
                                    </a>
                                </figure>
                                <div class="p-4">
                                    <a href="{{ url($product->slug) }}">
                                        <h1>
                                            {{ $product->title }}
                                        </h1>
                                    </a>
                                    <p>
                                        {{ $product->brief_description }}
                                    </p>
                                    <br>
                                    <button class="btn_primary px-4 py-2 mt-3" data-toggle="modal" data-target="#quote_form"
                                        onclick="$('input[name=product_name]').val('{{ $product->title }}')">
                                        Request Quote
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </section>
    @else
        <div style="height:500px" class="d-flex justify-content-center align-items-center">
            <h1>No Results Found!</h1>
        </div>
    @endif
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
