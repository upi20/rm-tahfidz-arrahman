<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'description' => isset($page_attr['description']) ? $page_attr['description'] : settings()->get(set_front('meta.description')),
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : settings()->get(set_front('meta.keyword')),
    'author' => isset($page_attr['author']) ? $page_attr['author'] : settings()->get(set_front('meta.author')),
    'image' => isset($page_attr['image']) ? $page_attr['image'] : asset(settings()->get(set_front('meta.image'))),
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'loader' => isset($page_attr['loader']) ? $page_attr['loader'] : settings()->get(set_front('app.preloader')),
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
    'url' => isset($page_attr['url']) ? $page_attr['url'] : url(''),
    'type' => isset($page_attr['type']) ? $page_attr['type'] : 'website',
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . settings()->get(set_front('app.title'), env('APP_NAME'));
$search_master_key = isset($_GET['search']) ? $_GET['search'] : '';

$getSosmed_val = feSocialMedia();
$notifikasi = feTopNotification();
$feKontakLists = feKontakList();

$compact = isset($compact) ? $compact : [];
$compact = array_merge($compact, compact('page_attr_title', 'search_master_key', 'notifikasi', 'page_attr', 'getSosmed_val', 'feKontakLists'));
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#fff">
    <meta name="theme-color" content="#548235">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/icon-144x144.png') }}">

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <!-- Primary Meta Tags -->
    <title>{{ $page_attr_title }}</title>
    <meta name="description" content="{{ $page_attr->description }}">
    <meta name="author" content="{{ $page_attr->author }}">
    <meta name="keywords" content="{{ $page_attr->keywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:url" content="{{ $page_attr->url }}">
    <meta property="og:type" content="{{ $page_attr->type }}">
    <meta property="og:title" content="{{ $page_attr_title }}">
    <meta property="og:description" content="{{ $page_attr->description }}">
    <meta property="og:image" content="{{ $page_attr->image }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $page_attr->url }}">
    <meta name="twitter:title" content="{{ $page_attr_title }}">
    <meta name="twitter:description" content="{{ $page_attr->description }}">
    <meta name="twitter:image" content="{{ $page_attr->image }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $page_attr_title }}">
    <meta itemprop="description" content="{{ $page_attr->description }}">
    <meta itemprop="image" content="{{ $page_attr->image }}">

    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/templates/admin/plugins/fontawesome-free-5.15.4-web/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/mainv2.css') }}">

    @foreach (json_decode(settings()->get(set_front('meta_list'), '{}')) as $meta)
        <!-- custom {{ $meta->name }} meta-->
        {!! $meta->value !!}
    @endforeach
    @yield('stylesheet')
    <style>
        .bottom-left-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1030;
        }

        #back-to-top {
            color: #fff;
            height: 50px;
            width: 50px;
            background-repeat: no-repeat;
            background-position: center;
            transition: background-color .1s linear;
            -moz-transition: background-color .1s linear;
            -webkit-transition: background-color .1s linear;
            -o-transition: background-color .1s linear;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: #FFF 3px solid;
        }

        #whatsapp-container {
            height: 50px;
            width: 50px;
            background-repeat: no-repeat;
            background-position: center;
            transition: background-color .1s linear;
            -moz-transition: background-color .1s linear;
            -webkit-transition: background-color .1s linear;
            -o-transition: background-color .1s linear;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: #FFF 3px solid;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @if ($page_attr->loader)
        <!-- preloader  -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader2">
                    <div class="spinner">
                        <img class="image-loader" src="{{ asset(settings()->get(set_front('app.foto_dark_mode'))) }}"
                            alt="Logo">
                    </div>
                    <div class="txt-loading">
                        <span data-text-preloader="W" id="letters-loading2">
                            W
                        </span>
                    </div>
                </div>
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="W" class="letters-loading">
                            W
                        </span>
                        <span data-text-preloader="K" class="letters-loading">
                            K
                        </span>
                        <span data-text-preloader="G" class="letters-loading">
                            G
                        </span>
                        <span data-text-preloader="R" class="letters-loading">
                            R
                        </span>
                    </div>
                </div>
                <div class="loader">
                    <div class="row">
                        <div class="col-3 loader-section section-left">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-left">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-right">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-right">
                            <div class="bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->
    @endif

    @include('templates.frontend.body.header', $compact)

    <main>
        @yield('content')
    </main>

    @include('templates.frontend.body.footer', $compact)

    <div class="bottom-left-container">
        <a class="button bg-success p-20 text-white fw-bold" id="whatsapp-container" style="text-decoration: none"
            href="https://api.whatsapp.com/send?phone={{ settings()->get(set_front('app.no_whatsapp')) }}"
            target="_blank">
            <i class="fab fa-whatsapp" style="font-size: 1.5em"></i>
        </a>
    </div>

    <!--========= JS Here =========-->
    <script src="{{ asset('assets/templates/frontend/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/lightcase.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/scrollwatch.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/sticky-header.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/waypoint.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/jquery-ui-slider-range.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/mainv3.js') }}"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfpGBFn5yRPvJrvAKoGIdj1O1aO9QisgQ"></script> --}}
    <script src="{{ asset('assets/templates/frontend/js/jquery.lazy-master/jquery.lazy.min.js') }}"></script>
    <link rel="stylesheet"
        href="{{ asset('assets/templates/admin/plugins/fontawesome-free-5.15.4-web/css/all.min.css') }}">
    @yield('javascript')
    <script>
        $(window).on('load', function() {
            $('.lazy').Lazy({
                scrollDirection: 'vertical',
            });
        });
    </script>
</body>



</html>
