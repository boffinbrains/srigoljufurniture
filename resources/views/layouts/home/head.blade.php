@isset($metaData->analytics)
    {!! $metaData->analytics !!}
@endisset
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="_token" content="{{ csrf_token() }}">
<meta name="title" content="@isset($metaData->meta_title){{ $metaData->meta_title }}@endisset">
<meta name="description" content="@isset($metaData->meta_description){{ $metaData->meta_description }}@endisset">
<link rel="canonical" href="@isset($metaData->canonical){{ $metaData->canonical }}@endisset" />
<title>
    Sri Golju Furniture Industries
    @isset($title)
        | {{ $title }}
    @endisset
</title>
<!-- Included Files -->
<link rel="icon" href="{{ asset('home/images/sri-golju-furniture-industries-logo-favicon.png') }}" type="image/png"
    sizes="16x16">
<link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('home/css/styles.css') }}">
<script src="{{ asset('home/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('home/js/script.js') }}"></script>
<!-- Included Files -->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=PT+Serif:wght@400;700&display=swap"
    rel="stylesheet">
<!-- Fonts -->
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
<script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('home/js/owl-carousel-start.js') }}"></script>
<!-- Owl Carousel -->
<!-- Icons Library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Icons Library -->
<!-- Magnific Popup -->
<script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}">
<!-- Magnific Popup -->
<!-- js-cookie -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"
    integrity="sha512-wT7uPE7tOP6w4o28u1DN775jYjHQApdBnib5Pho4RB0Pgd9y7eSkAV1BTqQydupYDB9GBhTcQQzyNMPMV3cAew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- js-cookie -->
<!-- Node Snackbar -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/node-snackbar/0.1.16/snackbar.min.css"
    integrity="sha512-pKdIPri9vb1aqcci9Rsl1xO7n74wHe5+RMcqRufN36EnXVtOsbct0VKDtBdhAnSCqZeny2jiZBSpXp0iDSzZ+Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/node-snackbar/0.1.16/snackbar.min.js"
    integrity="sha512-iILlngu0qmiyIkOH6MV1RWSya+DL2uzo0cb/nKR4hqwz9H+Xnop1++f8TMw1j5CdbutXGkBUyfRUfg/hmNBfZg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Node Snackbar -->