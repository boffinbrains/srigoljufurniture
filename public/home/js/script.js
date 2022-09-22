// App url
//var AppUrl = 'https://www.srigoljufurniture.com/';
var AppUrl = 'https://srigoljufurniture.com/';

// Side Nav Drawer
function transform(action, targetName) {
    if (action === 'open') {
        $(targetName).css('transform', 'translateX(100%)');
    } else if (action === 'close') {
        $(targetName).css('transform', 'translateX(-100%)');
    }
}

$(document).ready(function () {
    // Bottom Nav & Back To Top Btn
    $(window).scroll(() => {
        if ($(window).scrollTop() < $(window).height()) {
            $('.backToTop_btn').hide();
            $('.bottom_bar').css('position', 'sticky');
        } else if ($(window).scrollTop() < $(document).height() - $(window).height()) {
            $('.backToTop_btn').show();
            $('.bottom_bar').css('position', 'sticky');
        } else if ($(window).scrollTop() >= $(document).height() - $(window).height() - 100) {
            $('.bottom_bar').css('position', 'unset');
        }
    })
    // Image Preview
    $('.preview').on('click', function () {
        var img_path = $(this).find('img').attr('src');
        $('#image_preview').find('img').attr('src', img_path);
        $('#image_preview').modal('show');
    });

    var regex = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    var Data = [];
    // newsletter_form
    $('#newsletter_form_btn').on('click', function (e) {
        e.preventDefault();
        var email = $("input[name=newsletter_email]");
        if (email.val() && regex.test(email.val())) {
            formAjaxSubmit('newsletter-form-submit', '#newsletter_form', '#newsletter_form');
        } else {
            email.val('');
            email.attr('placeholder', 'Valid Email Required!')
            email.focus();
        }
    })
   
    // quick_enquiry
    $('#quick_enquiry_btn').on('click', function (e) {
        e.preventDefault();
        var enquiry_name = $("input[name=enquiry_name]");
        var enquiry_email = $("input[name=enquiry_email]");
        var enquiry_mobile_number = $("input[name=enquiry_mobile_number]");

        if (enquiry_name.val()) {
            if (enquiry_email.val() && regex.test(enquiry_email.val())) {
                if (enquiry_mobile_number.val()) {
                    formAjaxSubmit('quick-enquiry-form-submit', '#quick_enquiry', '#quick_enquiry button');
                    setTimeout(() => {
                        $('#enquiry_form_modal').modal('hide');
                    }, 3700);
                } else {
                    errorResponser('Enter Valid Mobile Number', enquiry_mobile_number);
                }
            } else {
                errorResponser('Name Required', enquiry_email);
            }
        } else {
            errorResponser('Name Required', enquiry_name);
        }
    })
    // request_quote
    $('#request_quote_btn').on('click', function (e) {
        e.preventDefault();
        var request_name = $("input[name=request_name]");
        var request_mobile_number = $("input[name=request_mobile_number]");

        if (request_name.val()) {
            if (request_mobile_number.val()) {
                formAjaxSubmit('request-form-submit', '#request_quote', '#request_quote button');
                setTimeout(() => {
                    $('#quote_form').modal('hide');
                }, 3700);
            } else {
                errorResponser('Enter Valid Mobile Number', request_mobile_number);
            }
        } else {
            errorResponser('Name Required', request_name);
        }
    })
    // contact_us_form
    $('#contact_us_form_btn').on('click', function (e) {
        e.preventDefault();
        var element = $('#contact_us_form_btn');

        var first_name = $("input[name=first_name]");
        var last_name = $("input[name=last_name]");
        var mobile_number = $("input[name=mobile_number]");
        var email = $("input[name=email]");
        var message = $("textarea[name=message]");

        if (first_name.val()) {
            if (last_name.val() || 1) {
                if (mobile_number.val()) {
                    if (email.val() && regex.test(email.val())) {
                        if (message.val()) {
                            formAjaxSubmit('contact-us-form-submit', '#contact_us_form', '#contact_us_form button');
                        } else {
                            errorResponser('Message Required', message);
                        }
                    } else {
                        errorResponser('Enter Valid Email Address', email);
                    }
                } else {
                    errorResponser('Enter Valid Mobile Number', mobile_number);
                }
            } else {
                errorResponser('Last Name Required', last_name);
            }
        } else {
            errorResponser('First Name Required', first_name);
        }
    })

    // *********************************************************************

    // Location Modal
    var array = decodeURIComponent(document.cookie).match(/location/);
    if (!array) {
        setTimeout(() => {
            $('#location').modal('show');
        }, 5000);
    }

    // Preloader
    $(window).on('load', function () {
        $('#preloader').fadeOut('slow');
    });

    // Validation Response
    function errorResponser(msg, element) {
        element.css('border', '2px solid #ff6666');
        element.after(`<span class="error" style="color:red;"> ${msg} </span>`).slideDown();
        setTimeout(() => {
            element.css('border', '2px solid');
            $('.error').remove();
        }, 1500);
    }

    function msgResponser(msg, element) {
        element.after(`<div class="error alert-primary mt-3 p-3 text-center"> ${msg} </div>`).slideDown();
        setTimeout(() => {
            $('.error').remove();
        }, 3500);
    }

    // AJAX Function
    function formAjaxSubmit(url, formId, el) {
        var btn = $(formId + ' button');
        $.ajaxSetup({
            headers: {
                'X_CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: AppUrl + url,
            data: $(formId).serialize(),
            dataType: "json",
            beforeSend: function () {
                btn.attr('disabled', true);
                btn.addClass('spinner');
            },
            success: function (response) {
                Data = JSON.parse(JSON.stringify(response));
                if (Data['response']) {
                    $(formId)[0].reset();
                }
                btn.attr('disabled', false);
                btn.removeClass('spinner');
                msgResponser(Data['message'], $(el));
            },
            error: function () {
                btn.attr('disabled', false);
                btn.removeClass('spinner');
                alert('Something Went Wrong! Try Again Later.');
            }
        });
    }

    // input-num
    $(function () {
        $(".input-num").keydown(function (e) {
            if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode >= 35 && e.keyCode <= 40) ||
                $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
                (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
})