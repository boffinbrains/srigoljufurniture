<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sri Golju Furniture Industries | Log in</title>
    <meta name="_token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('home/images/sri-golju-furniture-industries-logo.png') }}" alt="Sri Golju Furniture Industries" style="width:85%">
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if(isset(Auth::user()->mobile_number))
                <script>
                window.location = "{{ url('admin/dashboard') }}";
                </script>
                @endif
                <form id="login_form">
                    <div class="input-group mb-3">
                        <input type="text" id="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <button id="login_form_btn" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/js/jquery.min.js') }}"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('#login_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData();
            var username = $('#username').val();
            var password = $('#password').val();
            var emailRegex = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            fd = new FormData();
            fd.append('username', username);
            fd.append('password', password);

            if (username != '' && $.isNumeric(username) ? username.length === 10 : emailRegex.test(
                    username)) {
                if (password != '') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('login/checklogin') }}",
                        data: fd,
                        dataType: "json",
                        cache: false,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $('#login_form_btn').attr("disabled", true);
                        },
                        success: function(response) {
                            Data = JSON.parse(JSON.stringify(response));
                            $('#login_form')[0].reset();
                            if (Data['response']) {
                                window.location.replace("{{ url('/admin/dashboard') }}");
                            }
                        },
                        error: function() {
                            $('#login_form_btn').attr("disabled", false);
                            Toast.fire({
                                icon: 'error',
                                title: "You have entered Wrong Details!"
                            })
                        },
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: "Enter Valid Password"
                    })
                }
            } else {
                Toast.fire({
                    icon: 'error',
                    title: "Enter Valid Username"
                })
            }
        });
    });
    </script>
</body>

</html>