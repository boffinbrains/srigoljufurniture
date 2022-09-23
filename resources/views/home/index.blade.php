@extends('layouts.home.index')
@section('body')
    {{-- Home Banner --}}
    <section>
        <div id="homeMegaBanner" class="carousel_wrapper carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $key => $banner)
                    <a href="{{ url(get_category_slug($banner->category)) }}"
                        class="carousel-item {{ $key == 1 ? 'active' : '' }}">
                        <img src="{{ asset('images/banners/' . $banner->image) }}" class="d-block w-100"
                            alt="{{ $banner->title }}">
                    </a>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#homeMegaBanner" role="button" data-slide="prev"
                style="background: linear-gradient(90deg, black, transparent);">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#homeMegaBanner" role="button" data-slide="next"
                style="background: linear-gradient(270deg, black, transparent);">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="container py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="heading">
            <h2 class="display-4 m-0">
                Shop By Category
            </h2>
        </div>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-2 col-md-3 col-sm-6 col-6 mb-3">
                    <a class="text-center d-block h-100" href="{{ url($category->slug) }}">
                        {{-- <a class="text-center d-block h-100" href="{{ route('category', ['brand' => , 'category' => $category->slug]) }}"> --}}
                        <figure class="d-flex align-items-center m-auto" style="width:70px;height:70px">
                            <img src="{{ asset('images/category/' . $category->thumbnail) }}" alt="{{ $category->title }}"
                                class="img-fluid">
                        </figure>
                        <figcaption>
                            {{ $category->title }}
                        </figcaption>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    {{-- Brands we deal in --}}
    <section class="container-fluid py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="heading">
            <h2 class="display-4 m-0">
                Brands We Deal
            </h2>
            <span class="text-muted text-uppercase">
                TOP BRANDS
            </span>
        </div>
        <div class="container-fluid">
            <div class="owl-carousel owl-theme">
                @foreach ($brands as $brand)
                    <div class="item">
                        <a href="{{ url($brand->slug) }}">
                            <figure class="owl_product_figure bg_tertiary">
                                <img src="{{ asset('images/brand/' . $brand->image) }}" alt="{{ $brand->title }}">
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Offers banner --}}
    <section class="container-fluid w-100 py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <div class="shadow overflow-hidden">
                    <a href="{{ url('geeken?type=discount') }}">
                        <img src="{{ asset('home/images/banner-A-2.jpg') }}" alt="Discount on Geeken Furniture"
                            class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <div class="shadow overflow-hidden">
                    <a href="{{ url('modular?type=discount') }}">
                        <img src="{{ asset('home/images/banner-A-1.jpg') }}" alt="Discount on Modular Kitchen"
                            class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <div class="shadow overflow-hidden">
                    <a href="{{ url('/mall-rack') }}">
                        <img src="{{ asset('home/images/mall-rack-banner.jpg') }}" alt="Discount on Geeken Furniture"
                            class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <div class="shadow overflow-hidden">
                    <a href="{{ url('/modular-kitchen') }}">
                        <img src="{{ asset('home/images/Modular-kitchen-banner.jpg') }}" alt="Discount on Modular Kitchen"
                            class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- About --}}
    <section class="container-fluid py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="row">
            <div
                class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 text-white p-xl-5 p-lg-4 p-md-4 p-sm-3 p-3 mb-3 bg-dark">
                <h1 class="text-uppercase">welcome to {{ $about->title }}</h1>
                <p>
                    {{ $about->description }}
                </p>
                Call Us:
                <b>1800-123-777-778 (Toll Free)</b>
                <br>
                Email Us:
                <b>sales.srigoljufurniture@gmail.com</b>
                <br>
                <br>
                @foreach ($stores as $store)
                    <div class="d-flex flex-column">
                        {{ $store->title }} Showroom:
                        <b class="mb-3">
                            {{ $store->description }}
                        </b>
                    </div>
                @endforeach
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                <a href="{{ url('about-us') }}">
                    <img src="{{ asset('home/images/golju-tower.jpg') }}" alt="Golju Tower" class="img-fluid about_bg">
                </a>
            </div>
        </div>
    </section>
    {{-- Showroom Arrivals --}}
    <section class="container-fluid py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="heading">
            <h2 class="display-4 m-0">
                Latest Showroom Arrivals
            </h2>
            <span class="text-muted text-uppercase">
                New Arrivals
            </span>
        </div>
        <div class="container-fluid">
            <div class="owl-carousel owl-theme">
                @foreach ($products as $product)
                    <div class="item">
                        <a href="{{ url($product->slug) }}">
                            <figure class="owl_product_figure">
                                <img src="{{ asset('images/product/thumbnail/' . $product->thumbnail) }}" alt="">
                            </figure>
                            <div class="px-3 py-4 text-center">
                                <figcaption class="mb-3 font-weight-bold h5">
                                    {{ $product->title }}
                                </figcaption>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Testimonial --}}
    <div id="google-reviews"></div>
    <div class="modal fade" id="quote_form" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        <section class="col-12 col-md-6">
                            <figure class="mb-0 overflow-hidden h-100">
                                <img src="{{ asset('images/Discount-Popup.jpg') }}" alt="Image" class="w-100 h-100"
                                    style="object-fit: cover">
                            </figure>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="py-5 pr-4">
                                <h3 class="mb-4">
                                    Get Instant 15% Discount on the selected categories
                                </h3>
                                <form class="w-100" autocomplete="off" action="{{ url('request-form-submit') }}"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Your Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="mobile_number"
                                            placeholder="Your Mobile Number" maxlength="10" pattern="[6-9]{1}[0-9]{9}"
                                            title="Enter Valid Mobile Number" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="product_name" class="form-control"
                                            placeholder="Product Name">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" rows="7" placeholder="Type your message here..." class="form-control"
                                            style="resize: none;"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn_primary">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.rawgit.com/stevenmonson/googleReviews/master/google-places.css">
    <script
        src="https://cdn.jsdelivr.net/gh/stevenmonson/googleReviews@6e8f0d794393ec657dab69eb1421f3a60add23ef/google-places.js">
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDeivU57j-macv2fXXgbhKGM6cqMLmnAFI&signed_in=true&libraries=places">
    </script>
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                let discountModal = Cookies.get('discountModal');
                if(discountModal === undefined) {
                    Cookies.set('discountModal', 1, {
                        expires: 30
                    });
                    $('#quote_form').modal('show');
                    return;
                }
                if (discountModal == 1) {
                    Cookies.set('discountModal', 2, {
                        expires: 30
                    });
                    $('#quote_form').modal('show');
                }
            }, 8000);

            // $("#google-reviews").googlePlaces({
            //     placeId: "{{ env('GOOGLE_REVIEW_API_KEY') }}", //Note By BoffinBrains Find placeID @: https://developers.google.com/places/place-id,
            //     render: ['reviews'],
            //     min_rating: 3,
            //     max_rows: 1
            // });
        })
    </script>
@endsection
