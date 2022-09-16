<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .brandLogo{
            left: 50%;
            transform: translateX(-50%);
            top:0;
            z-index:9999;
            padding: .5rem;
        }
        
        .goljuLogo{
            bottom:0;
            left: 50%;
            transform: translateX(-50%);
            z-index:9999;
            padding: .5rem;
        }
        @media screen and (max-width: 575.98px) {
            .brandLogo{
                left: 50%;
                transform: translateX(-50%);
            }
            .goljuLogo{
                bottom:0;
                left:50%;
                transform: translateX(-50%);
            }
        }
        
        @media screen and (min-width: 576px) and (max-width: 767.98px) {
            .brandLogo{
                left: 50%;
                transform: translateX(-50%);
            }
            .goljuLogo{
                bottom:0;
                left:50%;
                transform: translateX(-50%);
            }
        }
        
        @media screen and (min-width: 768px) and (max-width: 991.98px) {
            .brandLogo{
                left: 50%;
                transform: translateX(-50%);
            }
            .goljuLogo{
                bottom:0;
                left:50%;
                transform: translateX(-50%);
            }
        }
        
        @media screen and (min-width: 992px) and (max-width: 1199.98px) {
            .brandLogo{
                left: 50%;
                transform: translateX(-50%);
            }
            .goljuLogo{
                bottom:0;
                left:50%;
                transform: translateX(-50%);
            }
        }
        
        @media screen and (min-width: 1200px) {
            .brandLogo{
                left: 0;
                transform: translateX(0);
            }
            .goljuLogo{
                top:0;
                right:0;
                left: unset;
                bottom: unset;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    @isset($data)
        @if (count($data) > 0)
            <section class="d-flex" style="height:100vh">
                <div id="presentation" class="w-100 carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner h-100 position-relative">
                        <div class="position-absolute bg-white goljuLogo">
                            <img src="{{ asset('home/images/sri-golju-furniture-industries-logo.png') }}" alt="Sri Golju Furniture" width="300">
                        </div>
                        @foreach ($data as $key => $item)
                            <div class="carousel-item h-100 position-relative {{ $key == 0 ? 'active' : '' }}">
                                @if ($item->type == 'image')
                                    <div class="position-absolute bg-white brandLogo">
                                        <img src="{{ asset('images/brand/'.$item->brandImage) }}" alt="Brand Name" width="200">
                                    </div>
                                    <img src="{{ asset('images/presentation/' . $item->image) }}"
                                        alt="{{ $item->title }}" class="img-fluid position-absolute m-auto"
                                        style="left:0;top:0;bottom:0;right:0">
                                @else
                                    <iframe style="width:100%;aspect-ratio:16/9" src="{{ $item->video }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <button class="text-dark carousel-control-prev" type="button" data-bs-target="#presentation"
                        data-bs-slide="prev">
                        <i class="bi bi-arrow-left-circle-fill h2"></i>
                    </button>
                    <button class="text-dark carousel-control-next" type="button" data-bs-target="#presentation"
                        data-bs-slide="next">
                        <i class="bi bi-arrow-right-circle-fill h2"></i>
                    </button>
                </div>
            </section>
        @endif
    @endisset
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
