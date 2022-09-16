@extends('layouts.home.index')
@section('body')

{{-- Intro --}}
<section class="container py-lg-4 py-md-4 py-sm-3 py-3">
    <div class="text-center mb-3">
        <h1>{{$about->title}}</h1>
    </div>
    <p>{{$about->description}}</p>
</section>
{{-- Our Core Values --}}
<section class="container py-lg-4 py-md-4 py-sm-3 py-3">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3 d-flex align-items-center">
            <img src="{{ asset('images/'.$about->image) }}" alt="Our Core Values" class="img-fluid">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
            <div class="text-center mb-3">
                <h2>Our Core Values</h2>
            </div>
            {!! $about->brief_description !!}
        </div>
    </div>
</section>
{{-- Our Founders --}}
<section class="container py-lg-4 py-md-4 py-sm-3 py-3">
    <div class="text-center mb-3">
        <h2>Our Founders</h2>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-3 mb-3">
            <div class="text-center shadow our_founders">
                <figure class="card_body">
                    <img src="{{ asset('home/images/Dummy-image.jpg') }}" alt="" class="img-fluid">
                </figure>
                <div class="py-4">
                    <figcaption class="font-weight-bold">Sri. Badri Prasad Gupta</figcaption>
                    <div class="text-muted mb-2">Chairman</div>
                    <div class="d-flex justify-content-around py-2">
                        <a href="https://www.facebook.com/SriGoljuFurnitureIndustries" target="_blank"
                            style="color: #444" onmouseover="this.style.color='#2b4b8c'"
                            onmouseout="this.style.color='#444'" title="facebook">
                            <i class="bi bi-facebook h3"></i>
                        </a>
                        <a href="https://www.instagram.com/sri_golju_furniture_industries" target="_blank"
                            style="color: #444;" onmouseover="this.style.color='#b107ab'"
                            onmouseout="this.style.color='#444'" title="instagram">
                            <i class="bi bi-instagram h3"></i>
                        </a>
                        <a href="https://www.linkedin.com/sri_golju_furniture_industries" target="_blank"
                            style="color: #444;" onmouseover="this.style.color='#0077b5'"
                            onmouseout="this.style.color='#444'" title="twitter">
                            <i class="bi bi-linkedin h3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-3 mb-3">
            <div class="text-center shadow our_founders">
                <figure class="card_body">
                    <img src="{{ asset('home/images/Dummy-image.jpg') }}" alt="" class="img-fluid">
                </figure>
                <div class="py-4">
                    <figcaption class="font-weight-bold">Mr. Mayank Mittal</figcaption>
                    <div class="text-muted mb-2">MD</div>
                    <div class="d-flex justify-content-around py-2">
                        <a href="https://www.facebook.com/SriGoljuFurnitureIndustries" target="_blank"
                            style="color: #444" onmouseover="this.style.color='#2b4b8c'"
                            onmouseout="this.style.color='#444'" title="facebook">
                            <i class="bi bi-facebook h3"></i>
                        </a>
                        <a href="https://www.instagram.com/sri_golju_furniture_industries" target="_blank"
                            style="color: #444;" onmouseover="this.style.color='#b107ab'"
                            onmouseout="this.style.color='#444'" title="instagram">
                            <i class="bi bi-instagram h3"></i>
                        </a>
                        <a href="https://www.linkedin.com/sri_golju_furniture_industries" target="_blank"
                            style="color: #444;" onmouseover="this.style.color='#0077b5'"
                            onmouseout="this.style.color='#444'" title="twitter">
                            <i class="bi bi-linkedin h3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-3 mb-3">
            <div class="text-center shadow our_founders">
                <figure class="card_body">
                    <img src="{{ asset('home/images/Dummy-image.jpg') }}" alt="" class="img-fluid">
                </figure>
                <div class="py-4">
                    <figcaption class="font-weight-bold">Mr. Manish Mittal</figcaption>
                    <div class="text-muted mb-2">CEO</div>
                    <div class="d-flex justify-content-around py-2">
                        <a href="https://www.facebook.com/SriGoljuFurnitureIndustries" target="_blank"
                            style="color: #444" onmouseover="this.style.color='#2b4b8c'"
                            onmouseout="this.style.color='#444'" title="facebook">
                            <i class="bi bi-facebook h3"></i>
                        </a>
                        <a href="https://www.instagram.com/sri_golju_furniture_industries" target="_blank"
                            style="color: #444;" onmouseover="this.style.color='#b107ab'"
                            onmouseout="this.style.color='#444'" title="instagram">
                            <i class="bi bi-instagram h3"></i>
                        </a>
                        <a href="https://www.linkedin.com/sri_golju_furniture_industries" target="_blank"
                            style="color: #444;" onmouseover="this.style.color='#0077b5'"
                            onmouseout="this.style.color='#444'" title="twitter">
                            <i class="bi bi-linkedin h3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Visit our Stores --}}
<section class="container py-lg-4 py-md-4 py-sm-3 py-3">
    <div class="text-center mb-3">
        <h2>Visit Our Experience Stores in Your City</h2>
    </div>
    <div class="row">
        @foreach ($stores as $store)
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
            <div class="shadow">
                <figure class="card_body">
                    <img src="{{ asset('images/store/'.$store->image) }}" alt="{{$store->title}}" class="img-fluid">
                </figure>
                <div class="p-lg-4 p-md-3 p-sm-3 p-3 text-center">
                    <figcaption class="font-weight-bold h3">{{$store->title}}</figcaption>
                    <span class="text-muted">{{$store->description}}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
{{-- Our Achievements --}}
<section class="container py-lg-4 py-md-4 py-sm-3 py-3">
    <div class="text-center mb-3">
        <h2>Our Achievements</h2>
    </div>
    <div class="certificates_grid">
        @foreach ($certificates as $certificate)
        <div class="certificates_grid_items">
            <img src="{{ asset('images/certificate/'.$certificate->image) }}" alt="{{$certificate->title}}">
        </div>
        @endforeach
    </div>
</section>
@endsection