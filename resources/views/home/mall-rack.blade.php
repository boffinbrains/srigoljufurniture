@extends('layouts.home.index')
@section('body')

{{-- Contact Form --}}
<figure class="mb-4">
    <img src="{{ asset('home/images/mall-rack-banner.jpg') }}" class="w-100" alt="mall-rack-banner">
</figure>
<section class="container py-lg-4 py-md-3 py-sm-3 py-3">
    <h1 class="display-4 font-weight-bold text-center">Write Us For Mall Rack Queries</h1>
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
        <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column flex-column">
            <div class="w-100 mr-lg-3 mr-md-3 mr-sm-0 mr-0">
                <label for="mobile_number">Mobile Number</label>
                <input type="tel" class="form-control input-num" maxlength="10" minlength="0" id="mobile_number"
                    name="mobile_number">
            </div>
            <div class="w-100">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Message</label>
            <textarea name="message" rows="7" placeholder="Type your message here..." class="form-control"
                style="resize: none;"></textarea>
        </div>
        <button class="py-2 px-5 btn_primary" id="contact_us_form_btn" type="button">Send</button>
    </form>
</section>
@endsection