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
                                    <button class="btn_primary px-4 py-2 mt-1" data-toggle="modal"
                                        data-target="#quote_form">Request
                                        Quote
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content align-items-center border-0" style="background: transparent;">
            <div class="bg-white p-lg-4 p-md-3 p-sm-3 p-3 shadow quick_enquiry_form">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Request Quote</h3>
                    <i class="bi bi-x h3" title="close" data-dismiss="modal"></i>
                </div>
                <form class="w-100" id="request_quote" autocomplete="off" novalidate>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="request_name" name="request_name"
                            placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="mobile_no" class="form-control" id="request_mobile_number"
                            name="request_mobile_number" placeholder="Your Mobile Number" maxlength="10"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                    <div class="form-group">
                        <textarea name="message" rows="7" placeholder="Type your message here..." class="form-control"
                            style="resize: none;" id="request_message"></textarea>
                    </div>
                    <button class="btn btn_primary" id="request_quote_btn">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
