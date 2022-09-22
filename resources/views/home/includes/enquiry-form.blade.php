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
                Request Quote
            </h3>
            <form class="w-100" autocomplete="off" action="{{ url('request-form-submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" name="mobile_number" placeholder="Your Mobile Number"
                        maxlength="10" pattern="[6-9]{1}[0-9]{9}" title="Enter Valid Mobile Number" required>
                </div>
                <div class="form-group">
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
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
@include('home.includes.snackbar')