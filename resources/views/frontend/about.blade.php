@extends('templates.frontend.master')
@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area pt-140 pb-140 bg_img"
        data-background="{{ asset('assets/templates/frontend2/images/bg/breadcrumb-bg-1.jpeg') }}" data-overlay="dark"
        data-opacity="5" style="height: auto;">
        <div class="shape shape__1">
            <img src="{{ asset('assets/templates/frontend2/images/shape/breadcrumb-shape-1.png') }}" alt="">
        </div>
        <div class="shape shape__2">
            <img src="{{ asset('assets/templates/frontend2/images/shape/breadcrumb-shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2 class="page-title">{{ settings()->get('about.judul') }}</h2>
                    <div class="cafena-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center">
                            <li class="cafenabcrumb-item duxinbcrumb-begin">
                                <a href="{{ route('home') }}"><span>Home</span></a>
                            </li>
                            <li class="cafenabcrumb-item duxinbcrumb-end">
                                <span>{{ settings()->get('about.judul') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- contact area start -->
    <div class="contact__area position-relative pt-120 pb-120">
        <span class="shape shape__1 position-absolute">
            <img src="{{ asset('assets/templates/frontend2/images/shape/hero-shape-2-1.png') }}" alt="">
        </span>
        <span class="shape shape__2 position-absolute">
            <img src="{{ asset('assets/templates/frontend2/images/shape/hero-shape-2-2.png') }}" alt="">
        </span>
        <div class="container">
            <div class="contact__wrapper">
                {!! settings()->get('about.html') !!}
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection
