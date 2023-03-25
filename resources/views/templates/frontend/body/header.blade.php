<!-- header start -->
<header class="site-header">
    @if ($notifikasi)
        @foreach ($notifikasi as $v)
            <div class="alert alert-dark" role="alert">
                <div class="container  d-flex justify-content-between">
                    <p class="text-dark">
                        {{ $v->deskripsi }}
                        @if ($v->link)
                            <a href="{{ $v->link }}" class="fw-bold">{{ $v->link_nama }}</a>
                        @endif
                    </p>
                    <span class="text-white fw-bold" style="cursor: pointer" onclick="$(this).parent().parent().fadeOut()">
                        x
                    </span>
                </div>
            </div>
        @endforeach
    @endif
    <div class="header-top header-top__2 d-none d-lg-block">
        <div class="container-fluid custom-width">
            <div class="row">
                <div class="col-xl-7 col-lg-12 align-self-center">
                    <div class="header-top__left d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ url('') }}">
                                <img src="{{ asset(settings()->get(set_front('app.foto_dark_mode'))) }}" alt="Logo">
                            </a>
                        </div>
                        <ul class="header-top__infos pl-75 list-unstyled d-flex align-items-center mb-0">
                            <li>
                                <a style="white-space: nowrap;"
                                    href="tel:{{ settings()->get(set_front('app.no_telepon')) }}">
                                    <i class="fas fa-phone-square"></i>
                                    {{ settings()->get(set_front('app.no_telepon')) }}
                                </a>
                            </li>
                            <li style="white-space: nowrap;">
                                <i class="fa fa-map-marker-alt"></i>
                                {{ settings()->get(set_front('app.address')) }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12  align-self-center">
                    <div
                        class="header-top__right header-top__right--2 d-flex justify-content-xl-end justify-content-center align-items-center">
                        <div
                            class="social-links social-links__2 d-flex align-items-center justify-content-md-start justify-content-center">
                            @foreach ($getSosmed_val as $sosmed)
                                <a href="{{ $sosmed['url'] }}" target="_blank">
                                    <i class="{{ $sosmed['icon'] }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-area menu-area-2 custom-padding">
        <div class="container-fluid custom-width">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-6">
                    <div class="logo mm-only d-md-block d-lg-none">
                        <a href="{{ url('') }}">
                            <img style="max-height: 70px"
                                src="{{ asset(settings()->get(set_front('app.foto_light_mode'))) }}" alt="img">
                        </a>
                    </div>
                    <div class="main-menu main-menu__2">
                        <nav id="mobile-menu">
                            <ul>
                                {!! navbar_menu_front($page_attr->navigation) !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-6 align-self-center">
                    <div class="menu-area__right menu-area__right--2 d-flex justify-content-end align-items-center">
                        <div class="search">
                            <div class="search__trigger item">
                                <span class="open"><i class="far fa-search"></i></span>
                                <span class="close"><i class="fal fa-times"></i></span>
                            </div>
                            <div class="search__form">
                                <form role="search" method="get"
                                    action="https://xpressrow.com/html/cafena/cafena/index.html">
                                    <input type="search" name="s" value="" placeholder="Search Keywords">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="hamburger-trigger item">
                            <i class="fas fa-bars"></i>
                        </div>
                        {{-- <div class="cart cart-trigger item position-relative">
                            <i class="fa fa-shopping-basket"></i>
                            <span class="cart__count">3</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<!-- side info for mobile view -->
<aside class="side-info-wrapper mm-only">
    <nav>
        <div class="nav" id="nav-tab" role="tablist">
            <a class="nav-link active" id="menu-tab-1-tab" data-bs-toggle="tab" href="#menu-tab-1" role="tab"
                aria-controls="menu-tab-1" aria-selected="true">Menu</a>
            <a class="nav-link" id="menu-tab-2-tab" data-bs-toggle="tab" href="#menu-tab-2" role="tab"
                aria-controls="menu-tab-2" aria-selected="false">Info</a>
        </div>
    </nav>
    <div class="side-info__wrapper d-flex align-items-center justify-content-between">
        <div class="side-info__logo">
            <a href="{{ url('') }}">
                <img style="max-height: 70px" src="{{ asset(settings()->get(set_front('app.foto_light_mode'))) }}"
                    alt="logo">
            </a>
        </div>
        <div class="side-info__close">
            <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="menu-tab-1" role="tabpanel" aria-labelledby="menu-tab-1-tab">
            <div class="mobile-menu"></div>
        </div>
        <div class="tab-pane fade" id="menu-tab-2" role="tabpanel" aria-labelledby="menu-tab-2-tab">
            <div class="side-info">
                <div class="side-info__content mb-35">
                    <h4 class="title mb-5">{!! settings()->get('setting.home.about.judul') !!}</h4>
                    <p>{!! settings()->get('setting.home.about.deskripsi') !!}</p>
                    <a class="site-btn mt-20" href="{!! str_parse(settings()->get('setting.home.hero.tombol_link')) !!}">{!! settings()->get('setting.home.hero.tombol_title') !!}</a>
                </div>
                <div class="contact__info--wrapper mt-15">
                    <h4 class="title mb-10">Contact us</h4>
                    <ul class="contact__info list-unstyled">
                        @foreach ($feKontakLists as $v)
                            <li>
                                <span><i class="{{ $v->icon }}"></i></span>
                                <p>{!! $v->keterangan !!}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="social-links mt-20 d-flex justify-content-start align-items-center">
                    @foreach ($getSosmed_val as $sosmed)
                        <a href="{{ $sosmed['url'] }}" target="_blank">
                            <i class="{{ $sosmed['icon'] }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- side info for desktop view -->
<aside class="side-info-wrapper show-all">
    <div class="side-info__wrapper d-flex align-items-center justify-content-between">
        <div class="side-info__logo">
            <a href="{{ url('') }}">
                <img style="max-height: 70px" src="{{ asset(settings()->get(set_front('app.foto_light_mode'))) }}"
                    alt="logo">
            </a>
        </div>
        <div class="side-info__close">
            <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
        </div>
    </div>
    <div class="side-info">
        <div class="side-info__content mb-35">
            <h4 class="title mb-5">{!! settings()->get('setting.home.about.judul') !!}</h4>
            <p>{!! settings()->get('setting.home.about.deskripsi') !!}</p>
            <a class="site-btn mt-20" href="{!! str_parse(settings()->get('setting.home.hero.tombol_link')) !!}">
                {!! settings()->get('setting.home.hero.tombol_title') !!}
            </a>
        </div>
        <div class="contact__info--wrapper mt-15">
            <h4 class="title mb-10">Contact us</h4>
            <ul class="contact__info list-unstyled">
                @foreach ($feKontakLists as $v)
                    <li>
                        <span><i class="{{ $v->icon }}"></i></span>
                        <p>{!! $v->keterangan !!}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="social-links mt-20 d-flex justify-content-start align-items-center">
            @foreach ($getSosmed_val as $sosmed)
                <a href="{{ $sosmed['url'] }}" target="_blank">
                    <i class="{{ $sosmed['icon'] }}"></i>
                </a>
            @endforeach
        </div>
    </div>
</aside>
<div class="overlay"></div>
