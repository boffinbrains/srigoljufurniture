<footer class="bg-dark text-white">
    <div class="container py-lg-5 py-md-4 py-sm-3 py-3">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                <div class="footer_sub_heading">
                    Popular Categories
                </div>
                <p>
                    Queen Size Beds | King Size Beds | Coffee Tables | Recliners | Sofa | Beds |
                    Rocking Chairs | Cabinets | Book Shelves | TV Unit | Wardrobes | Outdoor Furniture | Bar
                    Cabinets | Wall Shelves | Tables | Dining Room Furniture | Office Furniture | Bed Room Furniture
                    | Dining Table | Beds | Sofas | Geeken Chairs | Geeken Tables | Geeken Office Furniture | Geeken
                    School Furniture | Geeken Furniture
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                <div class="display-4 font-weight-bold mb-2">
                    Stay tuned to all our latest Updates
                </div>
                <!--<form id="newsletter_form" autocomplete="off">-->
                <!--    @csrf-->
                <!--    <div class="input-group">-->
                <!--        <input type="email" class="form-control custom_input" placeholder="Your email" name="newsletter_email">-->
                <!--        <div class="input-group-append">-->
                <!--            <button class="btn" id="newsletter_form_btn">-->
                <!--                <i class="bi bi-arrow-right text-white h3"></i>-->
                <!--            </button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->
                <p class="h2 mb-3">Join us on</p>
                <div class="mt-3">
                    <a href="https://www.facebook.com/SriGoljuFurnitureIndustries" target="_blank" style="color: #fff"
                        onmouseover="this.style.color='#00000050'" onmouseout="this.style.color='#fff'"
                        title="facebook">
                        <i class="bi bi-facebook h1"></i>
                    </a>
                    &nbsp;
                    <a href="https://www.instagram.com/sri_golju_furniture_industries" target="_blank"
                        style="color: #fff;" onmouseover="this.style.color='#00000050'"
                        onmouseout="this.style.color='#fff'" title="instagram">
                        <i class="bi bi-instagram h1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                <div class="footer_sub_heading">
                    Policy
                </div>
                <ul class="list-unstyled m-0">
                    <li class="mb-2">
                        <a href="{{ url('term-condition') }}">
                            Terms & Conditions
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('privacy-policy') }}">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
                <div class="footer_sub_heading">
                    Contact
                </div>
                <ul class="list-unstyled m-0">
                    <li class="mb-2">
                        <a href="{{ url('contact-us') }}">
                            Contact Us
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('service-support') }}">
                            Services & Support
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/') }}">
                            Stores
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="py-2 d-flex justify-content-center mt-3">
            &copy; Sri Golju Furniture Industries | All Rights Reserved
        </div>
    </div>
    {{-- back to top btn --}}
    <a href="#top" class="floating_btn backToTop_btn" style="right:100px" title="back to top">
        <i class="bi bi-arrow-up-circle d-lg-block d-md-block d-sm-none d-none"></i>
    </a>
    {{-- Quick Enquiry Form Btn --}}
    <button class="floating_btn enquiry_btn d-lg-block d-md-block d-sm-none d-none" title="Quick Enquiry"
        data-toggle="modal" data-target="#enquiry_form_modal">
        <i class="bi bi-chat text-white" style="background-color:#28a745"
            onmouseover="this.style.backgroundColor='#1c8834'" onmouseout="this.style.backgroundColor='#28a745'"></i>
    </button>
</footer>
{{-- Quick Enquiry Form --}}
<div class="modal fade" id="enquiry_form_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="w-100 p-lg-4 p-md-3 p-sm-3 p-3 shadow">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Quick Enquiry</h3>
                    <i class="bi bi-x h3" title="close" data-dismiss="modal"></i>
                </div>
                <form class="w-100" id="quick_enquiry" autocomplete="off" novalidate>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="enquiry_name"
                            placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="enquiry_email"
                            placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control input-num" id="mobile_number"
                            name="enquiry_mobile_number" placeholder="Your Mobile Number" maxlength="10">
                    </div>
                    <button class="btn btn_primary px-5" id="quick_enquiry_btn" type="button">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Tray -->
<div class="bottom_bar d-lg-none d-md-none d-sm-block d-block shadow">
    <ul class="list-unstyled m-0 d-flex justify-content-around">
        <li class="d-flex flex-column text-center">
            <a class="d-flex flex-column justify-content-center" href="{{ url('/') }}">
                <i class="bi bi-house h5"></i>Home
            </a>
        </li>
        <li class="d-flex flex-column text-center">

            <a class="d-flex flex-column justify-content-center" href="{{ url('products-list') }}">
                <i class="bi bi-grid-3x3-gap h5"></i>Products
            </a>
        </li>
        <li class="d-flex flex-column text-center">
            <a class="d-flex flex-column justify-content-center" href="#" data-toggle="modal"
                data-target="#enquiry_form_modal">
                <i class="bi bi-chat h5"></i>Enquiry
            </a>
        </li>
        <li class="d-flex flex-column text-center">
            <a class="d-flex flex-column justify-content-center" href="tel:7906921278">
                <i class="bi bi-telephone h5"></i>Call us
            </a>
        </li>
    </ul>
</div>
<!-- Img Preview Modal -->
<div class="modal fade" id="image_preview" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content align-items-center border-0" style="background: transparent;">
            <div class="w-100">
                <i class="bi bi-x h3" title="close" data-dismiss="modal" style="cursor: pointer;"></i>
                <img src="" alt="" class="w-100">
            </div>
        </div>
    </div>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    // var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    // (function(){
    // var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    // s1.async=true;
    // s1.src='https://embed.tawk.to/60e58c2fd6e7610a49aa0da2/1fa0an6ma';
    // s1.charset='UTF-8';
    // s1.setAttribute('crossorigin','*');
    // s0.parentNode.insertBefore(s1,s0);
    // })();
</script>
<!--End of Tawk.to Script-->
