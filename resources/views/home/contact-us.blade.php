@extends('layouts.home.index')
@section('body')
    {{-- Contact Form --}}
    <section class="container py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3 d-flex align-items-center">
                <img src="{{ asset('home/images/contact-us-bg.svg') }}" alt="Contact Us">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <div class="p-xl-5 p-lg-4 p-md-4 p-sm-3 p-3 shadow">
                    <h1 class="display-4 font-weight-bold">Get In Touch</h1>
                    <form class="w-100" autocomplete="off" id="contact_us_form">
                        @csrf
                        <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column flex-column">
                            <div class="w-100 mr-lg-3 mr-md-3 mr-sm-0 mr-0">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="first_name">
                            </div>
                            <div class="w-100">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="last_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="tel" class="form-control input-num" maxlength="10" minlength="0"
                                id="mobile_number" name="mobile_number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <textarea name="message" rows="7" placeholder="Type your message here..." class="form-control"
                                style="resize: none;"></textarea>
                        </div>
                        <button class="py-2 px-5 btn_primary" id="contact_us_form_btn" type="button">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- Contact Details --}}
    <section class="container py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="heading">
            <h2>Visit Our Stores</h2>
        </div>
        <div class="row">
            @foreach ($stores as $store)
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="shadow p-lg-4 p-md-3 p-sm-3 p-3">
                        <div class="h2 mb-2">{{ $store->title }}</div>
                        <address>{{ $store->description }}</address>
                        <div class="d-flex">
                            <i class="bi bi-telephone mr-2"></i>Call us:
                            &nbsp;<b>+91 {{ $store->mobile_number }}</b>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-envelope mr-2"></i>Email us:
                            &nbsp;<b>{{ $store->email }}</b>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3484.3390846677685!2d79.52005481543722!3d29.154678467006637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a09b1e6726e8eb%3A0xa08eb0286166740b!2sSri%20Golju%20Furniture%20Industries!5e0!3m2!1sen!2sin!4v1631347099070!5m2!1sen!2sin"
                    width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3444.1283085500754!2d78.01098171545564!3d30.318868012510634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39092b7a6bebc3e1%3A0x3773c1a89cb75a8f!2sSri%20Golju%20Furniture%20Industries!5e0!3m2!1sen!2sin!4v1631347299905!5m2!1sen!2sin"
                    width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection
