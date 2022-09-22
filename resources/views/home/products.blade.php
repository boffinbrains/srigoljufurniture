@extends('layouts.home.index')
@section('body')
    <section class="bg_color py-lg-4 py-md-4 py-sm-3 py-3">
        <div class="container-fluid">
            @php
                $count = count($data);
            @endphp
            @if ($count != 0)
                <p class="p-3 font-weight-bold text-info">
                    <a href="{{ url('/') }}">Home</a> / {{ $breadcrumbTitle }}
                </p>
                <div class="row">
                    @foreach ($data as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-3 position-relative">
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
                                        <img style="width: 400px; height:400px;"
                                            src="{{ asset('images/product/' . $product->image) }}"
                                            alt="{{ $product->title }}">
                                    </a>
                                </figure>
                                <div class="p-4">
                                    <a href="{{ url($product->slug) }}">
                                        <h1>
                                            {{ $product->title }}
                                        </h1>
                                    </a>
                                    <div style="height: 50px">
                                        {{ $product->brief_description }}
                                    </div>
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
            @else
                <div class="container-fluid text-center" style="background: #fff">
                    <div class="d-flex justify-content-center align-items-center py-4">
                        <h1> We Are Coming Soon With <span class="display-5 text-primary"> {{ $breadcrumbTitle }}
                            </span>
                            Products. </h1>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-5 col-10">
                            <img src="../public/images/brand/coming-soon.png" class="img-fluid" alt="coming soon">
                        </div>

                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

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
