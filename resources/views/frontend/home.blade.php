@extends('templates.frontend2.master')
@section('content')
    @php
        $p = 'setting.home';
        $k = "$p.hero";
    @endphp
    @if (settings()->get("$k.visible"))
        <!-- hero area start -->
        <section class="hero__area hero__area--2 position-relative custom-padding">
            <span class="shape shape__1 position-absolute">
                <img src="{{ asset('assets/templates/frontend2/images/shape/hero-shape-2-1.png') }}" class="lazy"
                    alt="hero">
            </span>
            <span class="shape shape__2 position-absolute">
                <img src="{{ asset('assets/templates/frontend2/images/shape/hero-shape-2-2.png') }}" class="lazy"
                    alt="hero">
            </span>
            <div class="container-fluid custom-width">
                <div class="row mm-reverse">
                    <div class="col-xl-6 col-lg-7 align-self-center">
                        <div class="hero__content hero__content--2 position-relative">
                            <h1 class="title mb-10">{!! settings()->get("$k.judul") !!}</h1>
                            <p>{!! settings()->get("$k.sub_judul") !!}</p>
                            <div class="btns mt-45 d-flex align-items-center justify-content-start">
                                <a href="{!! str_parse(settings()->get("$k.tombol_link")) !!}" class="site-btn">
                                    {!! settings()->get("$k.tombol_title") !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="hero__thumb hero__thumb--2 position-relative">
                            <img data-src="{!! asset(settings()->get("$k.foto")) !!}" alt="img" class="lazy">
                            @php
                                $yt_id = get_youtube_id(settings()->get("$k.video_link"));
                                $url = "https://www.youtube.com/embed/{$yt_id}?rel=0&amp;controls=0&amp;showinfo=0";
                            @endphp
                            <a href="{!! $url !!}" data-rel="lightcase:myCollection" data-animation="fadeInLeft"
                                class="video-btn video-btn__2 d-flex align-items-center"><i class="fas fa-play"></i><span
                                    class="border-effect">{!! settings()->get("$k.video_title") !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero area end -->
    @endif


    @php $k = "$p.about"; @endphp
    @if (settings()->get("$k.visible"))
        <!-- about area start -->
        <section class="about__area about__area--2 grey-bg position-relative pt-120 pb-130">
            <span class="shape shape__1 position-absolute">
                <img class="lazy" data-src="{{ asset('assets/templates/frontend2/images/shape/about-shape-2-1.png') }}"
                    alt="Background Image">
            </span>
            <span class="shape shape__2 position-absolute">
                <img class="lazy" data-src="{{ asset('assets/templates/frontend2/images/shape/about-shape-2-2.png') }}"
                    alt="Background Image">
            </span>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7">
                        <div class="about__left about__left--2 position-relative">
                            <img style="max-height: 528px" class="big lazy"
                                data-src="{{ asset(settings()->get("$k.foto1")) }}" alt="Foto 1">
                            <img class="small position-absolute lazy" data-src="{{ asset(settings()->get("$k.foto2")) }}"
                                alt="Foto 2">
                        </div>
                    </div>
                    <div class="col-xl-6 offset-xl-1">
                        <div class="about__right about__right--2 pl-45 pt-45">
                            <div class="section-heading section-heading__black">
                                <span class="sub-title">{!! settings()->get("$k.judul") !!}</span>
                                <h2 class="title mb-25">{!! settings()->get("$k.sub_judul") !!}</h2>
                                <p style="font-size: 1.5em">
                                    {!! settings()->get("$k.deskripsi") !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->
    @endif


    @php $k = "$p.top_grade"; @endphp
    @if (settings()->get("$k.visible"))
        <!-- top grade area start -->
        <section class="topgrade__area topgrade__area--2 pt-115 pb-115 position-relative" id="top-grade">
            <span class="shape shape__1 position-absolute">
                <img class="lazy"
                    data-src="{{ asset('assets/templates/frontend2/images/shape/top-grade-shape-2-1.png') }}"
                    alt="Background Image">
            </span>
            <span class="shape shape__2 position-absolute">
                <img class="lazy"
                    data-src="{{ asset('assets/templates/frontend2/images/shape/top-grade-shape-2-2.png') }}"
                    alt="Background Image">
            </span>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="section-heading section-heading__black mb-55">
                            <span class="sub-title">{!! settings()->get("$k.title") !!}</span>
                            <h2 class="title">{!! settings()->get("$k.sub_title") !!}</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-none-30">
                    @foreach ($top_grades as $number => $top_grade)
                        <div class="col-xl-3 col-lg-6 col-md-6 mt-30">
                            <div class="topgrade__item topgrade__item--2 text-center">
                                <div class="thumb">
                                    <img data-src="{{ $top_grade->fotoUrl() }}" alt="{{ $top_grade->nama }}" class="lazy">
                                    @if (settings()->get("$k.number"))
                                        <span class="count">{{ $number + 1 }}</span>
                                    @endif
                                </div>
                                <div class="content mt-20">
                                    <h2 class="title">{{ $top_grade->nama }}</h2>
                                    <p>{!! $top_grade->keterangan !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- top grade area end -->
    @endif


    @php $k = "$p.katalog"; @endphp
    @if (settings()->get("$k.visible"))
        <section class="about__area about__area--3 grey-bg position-relative pt-120 pb-120">
            <span class="shape shape__2 position-absolute">
                <img class="lazy" data-src="{{ asset('assets/templates/frontend2/images/shape/about-shape-2-2.png') }}"
                    alt="Background Image">
            </span>
            <div class="container-fluid custom-width custom-width__2">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="section-heading section-heading__black">
                            <span class="sub-title">{{ settings()->get("$k.title") }}</span>
                            <h2 class="title">{{ settings()->get("$k.sub_title") }}</h2>
                        </div>
                    </div>
                </div>
                @foreach ($produks as $k => $produk)
                    <div class="d-md-flex flex-row{{ ($k + 1) % 2 == 0 ? '-reverse' : '' }} mt-100">
                        @if (isset($produk->fotos[0]))
                            <img data-src="{{ $produk->fotos[0]->fotoUrl() }}" alt="{{ $produk->fotos[0]->nama }}"
                                class="lazy foto-produk">
                        @endif

                        <div class="about__right about__history">
                            <div class="section-heading">
                                <a href="{{ route('katalog', ['kategori' => $produk->kategori->slug]) }}">
                                    <span class="sub-title">
                                        {{ $produk->kategori->nama }}
                                    </span>
                                </a>
                                <a href="{{ route('katalog.detail', $produk->slug) }}" style="text-decoration: none">
                                    <h2 class="title mb-25">
                                        {{ $produk->nama }}
                                    </h2>
                                </a>
                                <p class="mb-0">{{ $produk->kilasan }} <br><br>Tersedia Di:</p>
                                @if ($produk->marketplaces->count())
                                    <div class="pd-social-wrapper mt-0 pt-0">
                                        <div class="social-links d-flex align-items-center">
                                            @foreach ($produk->marketplaces as $marketplace)
                                                @php
                                                    $url = $marketplace->link !== null ? $marketplace->link : '';
                                                    $url = $url == '' ? ($marketplace->jenis->link_produk !== null ? $marketplace->jenis->link_produk : '') : $url;
                                                    $url = $url == '' ? ($marketplace->jenis->link !== null ? $marketplace->jenis->link : '') : $url;
                                                @endphp
                                                <a href="{{ $url }}" target="_blank" style="border:none">
                                                    <img class="lazy shadow-sm"
                                                        data-src="{{ $marketplace->jenis->fotoUrl('foto_icon') }}"
                                                        alt="{{ $marketplace->jenis->nama }}"
                                                        style="margin: auto; 
                                                        position: relative; 
                                                        margin: auto; 
                                                        width: 35px; 
                                                        height: 35px; 
                                                        background-color: white; 
                                                        max-height: 35px; 
                                                        border-radius: 4px; 
                                                        padding: 2px; 
                                                        object-fit: cover; 
                                                        object-position: center; 
                                                        -webkit-border-radius: 4px; 
                                                        -moz-border-radius: 4px;">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif


    @php $k = "$p.testimonial"; @endphp
    @if (settings()->get("$k.visible"))
        <section class="testimonial__area pt-115 pb-110 position-relative bg_img" data-overlay="dark" data-opacity="5"
            data-background="{{ asset(settings()->get("$k.image")) }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="section-heading mb-40">
                            <span class="sub-title">{{ settings()->get("$k.title") }}</span>
                            <h2 class="title">{{ settings()->get("$k.sub_title") }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="testimonial__active owl-carousel slider-nav">

                            @foreach ($testimonials ?? [] as $testimoni)
                                <div class="testimonial__item text-center">
                                    <div class="row g-0 justify-content-center">
                                        <div class="col-xl-8">
                                            <span class="quote mb-20">
                                                <img data-src="{{ asset('assets/home/testimonials/t-quote.png') }}"
                                                    alt="Testimonial background"class="lazy">
                                            </span>
                                            <p>{{ $testimoni->testimoni }}</p>
                                            <div class="author-info mt-35">
                                                <div class="thumb mb-25">
                                                    <img data-src="{{ $testimoni->fotoUrl() }}"
                                                        alt="{{ $testimoni->nama }}" class="lazy"
                                                        style="margin: auto; position: relative; margin: auto; width: 60px; height: 60px; max-height: 60px; border-radius: 60px; object-fit: cover; object-position: center; -webkit-border-radius: 60px; -moz-border-radius: 60px;">
                                                </div>
                                                <div class="content">
                                                    <h4 class="name">{{ $testimoni->nama }}</h4>
                                                    <span class="designation">{{ $testimoni->sebagai }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @php $k = "setting.contact.faq"; @endphp
    @if (settings()->get("$k.visible"))
        <!-- faq area start -->
        <section class="topgrade__area topgrade__area--2 pt-115 pb-115 position-relative">
            <span class="shape shape__1 position-absolute">
                <img data-src="{{ asset('assets/templates/frontend2/images/shape/top-grade-shape-2-1.png') }}"
                    alt="bg" class="lazy">
            </span>
            <span class="shape shape__2 position-absolute">
                <img data-src="{{ asset('assets/templates/frontend2/images/shape/top-grade-shape-2-2.png') }}"
                    alt="bg" class="lazy">
            </span>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="section-heading section-heading__black mb-55">
                            <span class="sub-title">{{ settings()->get("$k.title") }}</span>
                            <h2 class="title">{{ settings()->get("$k.sub_title") }}</h2>
                        </div>
                    </div>
                </div>

                <div class="faq__wrapper">
                    <div class="accordion" id="accordionFaq">
                        @foreach ($faqs as $k => $v)
                            <div class="accordion-item faq__item">
                                <h2 class="accordion-header title" id="heading{{ $k }}">
                                    @if ($v->type == 2)
                                        <a href="{{ $v->link }}">
                                    @endif
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $k }}" aria-expanded="true"
                                        aria-controls="collapse{{ $k }}">
                                        {{ $v->nama }}
                                    </button>
                                    @if ($v->type == 2)
                                        </a>
                                    @endif
                                </h2>
                                <div id="collapse{{ $k }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $k }}" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body content">
                                        <p>{{ $v->jawaban }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- faq area end -->
    @endif


    @php $k = "$p.artikel"; @endphp
    @if (settings()->get("$k.visible"))
        {{-- Artikel --}}
        <div class="blog__area blog__area--2 position-relative  grey-bg pt-115 pb-120">
            <span class="shape shape__1">
                <img data-src="{{ asset('assets/templates/frontend2/images/shape/blog-shape-2-1.png') }}"
                    class="lazy"alt="bg">
            </span>
            <span class="shape shape__2">
                <img data-src="{{ asset('assets/templates/frontend2/images/shape/blog-shape-2-2.png') }}"
                    class="lazy"alt="bg">
            </span>
            <div class="container">
                <div class="row align-items-end mb-60">
                    <div class="col-lg-8">
                        <div class="section-heading section-heading__black">
                            <span class="sub-title">{{ settings()->get("$k.title") }}</span>
                            <h2 class="title">{{ settings()->get("$k.sub_title") }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="btns-wrapper text-center text-lg-end">
                            <a href="{{ route('artikel') }}"
                                class="site-btn">{{ settings()->get("$k.button_text") }}</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-none-30">
                    @foreach ($articles as $artikel)
                        <div class="col-xl-4 col-lg-6 col-md-6 mt-30">
                            <article class="blog__item blog__item--2">
                                <div class="thumb position-relative">
                                    <div class="img">
                                        <img data-src="{{ $artikel->fotoUrl() }}" alt="{{ $artikel->nama }}"
                                            style="width: 100%; height: 300px; object-fit: cover;"class="lazy">
                                    </div>
                                </div>
                                <div class="content content__2">
                                    <ul
                                        class="blog__meta blog__meta--2 list-unstyled d-flex align-items-center justify-content-start">
                                        <li>
                                            <span>By: </span> {{ isset($artikel->user->name) ? $artikel->user->name : '' }}
                                        </li>
                                    </ul>
                                    <h3 class="blog__title blog__title--2 border-effect">
                                        <a href="{{ route('artikel.detail', $artikel->slug) }}">{{ $artikel->nama }}</a>
                                    </h3>
                                    <div class="btn-wrapper mt-15 d-flex justify-content-between">
                                        <a href="{{ route('artikel.detail', $artikel->slug) }}"
                                            class="read-more read-more__2">
                                            Read more <i class="fa fa-long-arrow-right"></i></a>
                                        {{-- <a href="#0" class="share-btn"><i class="fal fa-share-alt"></i></a> --}}
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- blog area end -->
    @endif
@endsection
@section('stylesheet')
    <style>
        .foto-produk {
            width: 40%;
            object-fit: cover;
            object-position: center;
        }

        @media (max-width: 767px) {
            .foto-produk {
                width: 100%;
            }
        }
    </style>
@endsection
