@extends('templates.frontend.master')
@section('content')
    @php
        $p = 'setting.home';
        $k = "$p.hero";
    @endphp
    @if (settings()->get("$k.visible"))
        <!-- Hero section start here -->
        <section class="about-section padding-tb shape-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="lab-item">
                            <div class="lab-inner">
                                <div class="lab-content">
                                    <div class="header-title text-start m-0">
                                        <h2 class="mb-0">
                                            {!! settings()->get("$k.judul") !!}
                                        </h2>
                                    </div>
                                    <h5 class="my-4">
                                        {!! settings()->get("$k.sub_judul") !!}
                                    </h5>
                                    <p>
                                        {!! settings()->get("$k.deskripsi") !!}
                                    </p>
                                    <a href="{!! str_parse(settings()->get("$k.tombol_link")) !!}" class="lab-btn mt-4">
                                        {!! settings()->get("$k.tombol_title") !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="lab-item">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <div class="img-grp">
                                        <div class="about-circle-wrapper">
                                            <div class="about-circle-2"></div>
                                            <div class="about-circle"></div>
                                        </div>
                                        <div class="about-fg-img">
                                            <img class="lazy" alt="hero-image" data-src="{!! asset(settings()->get("$k.foto")) !!}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero section end here -->
    @endif

    <!-- Feature Section Start Here -->
    <section class="feature-section bg-ash padding-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="lab-item feature-item text-xs-center">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img class="lazy" alt="feature-image"
                                    data-src="{{ asset('assets/templates/frontend/images/feature/01.png') }}">
                            </div>
                            <div class="lab-content">
                                <h5>Tafsir Quran</h5>
                                <p>
                                    Mempelajari tentang teknik dan metode penafsiran Al-Quran serta makna ayat-ayat
                                    Al-Quran
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="lab-item feature-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img class="lazy" alt="feature-image"
                                    data-src="{{ asset('assets/templates/frontend/images/feature/02.png') }}">
                            </div>
                            <div class="lab-content">
                                <h5>Belajar Fiqh</h5>
                                <p>
                                    Mempelajari aturan-aturan dan hukum-hukum Islam, baik yang terkait dengan ibadah
                                    maupun yang lain.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="lab-item feature-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img class="lazy" alt="feature-image"
                                    data-src="{{ asset('assets/templates/frontend/images/feature/03.png') }}">
                            </div>
                            <div class="lab-content">
                                <h5>Belajar Aqidah</h5>
                                <p>
                                    Mempelajari tentang kepercayaan dan keyakinan dalam agama Islam,seperti kepercayaan
                                    kepada Allah, malaikat, kitab-kitab suci, dan sebagainya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="lab-item feature-item">
                        <div class="lab-inner">
                            <div class="lab-thumb">
                                <img class="lazy" alt="feature-image"
                                    data-src="{{ asset('assets/templates/frontend/images/feature/04.png') }}">
                            </div>
                            <div class="lab-content">
                                <h5>Sejarah Islam</h5>
                                <p>
                                    Mempelajari tentang sejarah perkembangan agama Islam dan peristiwa-peristiwa penting
                                    yang terkait dengan Islam.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section End Here -->

    @php $k = "$p.galeri"; @endphp
    @if (settings()->get("$k.visible"))
        <!-- Galeri Section start here -->
        <section class="event-section padding-tb padding-b shape-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-title">
                            <h5>{!! settings()->get("$k.title") !!}</h5>
                            <h2>{!! settings()->get("$k.sub_title") !!}</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="event-content">
                            @if (isset($galeries[0]))
                                @php $galeri = $galeries[0]; @endphp
                                <div class="event-top tri-shape-2 pattern-2">
                                    <div class="event-top-thumb">
                                        <img class="lazy"
                                            data-src="{{ "https://drive.google.com/uc?export=view&id={$galeri->foto_id_gdrive}" }}"
                                            alt="{{ $galeri->nama }}">
                                    </div>
                                    <div class="event-top-content">
                                        <div class="event-top-content-wrapper">
                                            <h3>
                                                <a href="{{ route('galeri.detail', $galeri->slug) }}">
                                                    {{ $galeri->nama }}
                                                </a>
                                            </h3>
                                            <div class="date-count-wrapper">
                                                <ul class="lab-ul event-date">
                                                    <li>
                                                        <i class="icofont-calendar"></i>
                                                        <span>{{ $galeri->dateFormat() }}</span>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-location-pin"></i>
                                                        <span>{{ $galeri->lokasi }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($galeries[1]))
                                <div class="event-bottom">
                                    <div class="row justify-content-center">
                                        @foreach ($galeries as $k => $galeri)
                                            @if ($k < 1)
                                                @continue
                                            @endif
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="event-item lab-item">
                                                    <div class="lab-inner">
                                                        <div class="lab-thumb">
                                                            <img class="lazy"
                                                                data-src="{{ "https://drive.google.com/uc?export=view&id={$galeri->foto_id_gdrive}" }}"
                                                                alt="{{ $galeri->nama }}">
                                                        </div>
                                                        <div class="lab-content">
                                                            <h5>
                                                                <a href="{{ route('galeri.detail', $galeri->slug) }}">
                                                                    {{ $galeri->nama }}
                                                                </a>
                                                            </h5>
                                                            <ul class="lab-ul event-date">
                                                                <li>
                                                                    <i class="icofont-calendar"></i>
                                                                    <span>{{ $galeri->dateFormat() }}</span>
                                                                </li>
                                                                <li>
                                                                    <i class="icofont-location-pin"></i>
                                                                    <span>{{ $galeri->lokasi }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Galeri Section end here -->
    @endif

    <!-- Qoute Section start Here -->
    <div class="qoute-section padding-tb">
        <div class="qoute-section-wrapper">
            <div class="qoute-overlay"></div>
            <div class="container">
                <div class="qoute-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="lab-item qoute-item">
                                <div class="lab-inner d-flex align-items-center">
                                    <div class="lab-thumb">
                                        <span>Quote From
                                            Prophat</span>
                                        <i class="icofont-quote-left"></i>
                                    </div>
                                    <div class="lab-content">
                                        <blockquote class="blockquote">
                                            <p>Hazrat Mohammod (s) Said <span>"It is Better For Any Of You
                                                    To Carry A Load Of Firewood On His Own Back Than To
                                                    Beg From Someone Else"</span> </p>
                                            <footer class="blockquote-footer bg-transparent">Riyadh-Us-Saleheen,
                                                Chapter
                                                59, hadith 540
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qoute Section end Here -->

    @php $k = "setting.contact.faq"; @endphp
    @if (settings()->get("$k.visible"))
        <!-- FAQ section start here -->
        <section class="service-section padding-tb padding-b shape-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-title">
                            <h5>{{ settings()->get("$k.title") }}</h5>
                            <h2>{{ settings()->get("$k.sub_title") }}</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="accordion" id="accordionFaq">
                            @foreach ($faqs as $k => $v)
                                <div class="accordion-item faq__item">
                                    <h2 class="accordion-header title" id="heading{{ $k }}">
                                        @if ($v->type == 2)
                                            <a href="{{ $v->link }}" style="width: 100%">
                                        @endif
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $k }}"
                                            aria-expanded="true" aria-controls="collapse{{ $k }}">
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
            </div>
        </section>
        <!-- FAQ section end here -->
    @endif

    @php $k = "$p.artikel"; @endphp
    @if (settings()->get("$k.visible"))
        <!-- Artikel section start here -->
        <section class="service-section padding-b">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-title">
                            <h5>{{ settings()->get("$k.title") }}</h5>
                            <h2>{{ settings()->get("$k.sub_title") }}</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row g-0 justify-content-center service-wrapper">

                            @foreach ($articles as $artikel)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="lab-item service-item">
                                        <div class="lab-inner">
                                            <div class="lab-thumb">
                                                <img class="lazy" data-src="{{ $artikel->fotoUrl() }}"
                                                    alt="{{ $artikel->nama }}"
                                                    style="width: 100%; height: 300px; object-fit: cover;">
                                            </div>
                                            <div class="lab-content pattern-2">
                                                <div class="lab-content-wrapper">
                                                    <div class="content-top">
                                                        <div class="service-top-content">
                                                            @if (isset($artikel->categories[0]))
                                                                <a
                                                                    href="{{ route('artikel', ['kategori' => $artikel->categories[0]->slug]) }}">
                                                                    <span>{{ $artikel->categories[0]->nama }}</span>
                                                                </a>
                                                            @endif
                                                            <h5>
                                                                <a href="{{ route('artikel.detail', $artikel->slug) }}">
                                                                    {{ $artikel->nama }}
                                                                </a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="content-bottom">
                                                        <p>{{ text_cutter($artikel->excerpt) }}</p>
                                                        <a href="{{ route('artikel.detail', $artikel->slug) }}"
                                                            class="text-btn">
                                                            Baca selengkapnya +
                                                        </a>
                                                    </div>
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
        <!-- Artikel section end here -->
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
