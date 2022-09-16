@extends('layouts.home.index')
@section('body')
    <section class="container-fluid term__box">
        <div class="container">
            <div class="card my-5">
                <div class="d-flex align-items-center justify-content-center fw-bolder term__head">
                    <h1>Terms And Condition</h1>
                </div>
                <div class="card-body">
                    <ul class="m-lg-5 m-md-3">
                        <li class="my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates aperiam, cupiditate dolor
                            quis dignissimos pariatur nihil quia laboriosam, obcaecati adipisci illo blanditiis mollitia
                            quae aliquam. Molestias aliquam fuga ab excepturi.
                        </li>
                        <li class="my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates aperiam, cupiditate dolor
                            quis dignissimos pariatur nihil quia laboriosam, obcaecati adipisci illo blanditiis mollitia
                            quae aliquam. Molestias aliquam fuga ab excepturi.
                        </li>
                        <li class="my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates aperiam, cupiditate dolor
                            quis dignissimos pariatur nihil quia laboriosam, obcaecati adipisci illo blanditiis mollitia
                            quae aliquam. Molestias aliquam fuga ab excepturi.
                        </li>
                        <li class="my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates aperiam, cupiditate dolor
                            quis dignissimos pariatur nihil quia laboriosam, obcaecati adipisci illo blanditiis mollitia
                            quae aliquam. Molestias aliquam fuga ab excepturi.
                        </li>
                        <li class="my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates aperiam, cupiditate dolor
                            quis dignissimos pariatur nihil quia laboriosam, obcaecati adipisci illo blanditiis mollitia
                            quae aliquam. Molestias aliquam fuga ab excepturi.
                        </li>
                    </ul>
                    <div class="d-flex justify-content-around align-items-center">
                        <div class="h6 text-danger">For More Enquiry <span class="mx-2"><i
                                    class="bi bi-arrow-right"></i></span>
                        </div>
                        <a href="{{ url('contact-us') }}">
                            <button class="btn btn-primary">Contact Us</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
