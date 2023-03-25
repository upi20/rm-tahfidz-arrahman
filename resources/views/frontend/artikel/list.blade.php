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
                    <h2 class="page-title">{{ $routeTitle }}</h2>
                    <div class="cafena-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center">
                            <li class="cafenabcrumb-item duxinbcrumb-begin">
                                <a href="{{ route('home') }}"><span>Home</span></a>
                            </li>
                            <li class="cafenabcrumb-item duxinbcrumb-end">
                                <span>{{ $routeTitle }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- blog area start -->
    <div class="blog-area pt-120 pb-105">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog__wrapper mt-none-30">
                        @foreach ($articles as $a)
                            <article class="blog__post format format-image mt-30">
                                <div class="thumb">
                                    <img src="{{ $a->fotoUrl() }}" alt="">
                                </div>

                                {{-- tag meta --}}
                                <ul class="meta mt-10 list-unstyled d-flex align-items-center">
                                    @foreach ($a->categories as $kategori)
                                        <li>
                                            <a href="{{ url("artikel?kategori=$kategori->slug") }}">
                                                <i class="fal fa-file"></i> {{ $kategori->nama }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fal fa-calendar-alt"></i>
                                            {{ $a->dateFormat() }}
                                        </a>
                                    </li>
                                </ul>

                                <div class="content mt-10">
                                    <h2 class="title border-effect mb-10">
                                        <a href="{{ route('artikel.detail', $a->slug) }}">{{ $a->nama }}</a>
                                    </h2>
                                    <p>{{ $a->excerpt }}</p>
                                </div>
                                <div class="bottom mt-35 d-flex align-items-center">
                                    <a href="{{ route('artikel.detail', $a->slug) }}" class="site-btn">
                                        Baca Selengkapnya
                                    </a>
                                    @if ($a->user)
                                        <div class="author d-flex align-items-center">
                                            <i class="fas fa-user me-2"></i>
                                            <h5 class="border-effect">
                                                <a href="{{ route('artikel.detail', $a->slug) }}" class="name">
                                                    {{ $a->user->name }}
                                                </a>
                                            </h5>
                                        </div>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    {!! $articles->links() !!}
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog__sidebar mt-none-30">
                        <div class="widget mt-30">
                            <h2 class="title">Pencarian</h2>
                            @php
                                $rQuery = unsetByKey($request->query(), ['search', 'page']);
                            @endphp
                            <form action="{{ route('artikel', $rQuery) }}" class="search-widget" method="GET">
                                @foreach ($rQuery ?? [] as $name => $value)
                                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                                @endforeach
                                <input type="search" name="search" id="search" placeholder="Kata Kunci"
                                    value="{{ request()->search }}">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>

                            @if (count($request->query()) > 0)
                                <a href="{{ route('artikel') }}" class="btn btn-secondary mt-1">Reset</a>
                            @endif
                        </div>

                        {{-- kategori --}}
                        @if ($categories->count())
                            <div class="widget mt-30">
                                <h2 class="title">Kategori</h2>
                                <ul>
                                    @foreach ($categories as $kategori)
                                        @php
                                            $is_active = $kategori_selected ? $kategori_selected->slug == $kategori->slug : false;
                                            $rQuery = unsetByKey($request->query(), ['kategori']);
                                        @endphp
                                        <li class="{{ $is_active ? 'bg-dark' : '' }} cat-item">
                                            <a href="{{ route('artikel', $is_active ? $rQuery : array_merge($rQuery, ['kategori' => $kategori->slug])) }}"
                                                class="{{ $is_active ? 'text-white' : '' }}">
                                                {{ $kategori->nama }}
                                            </a>
                                            <span class="{{ $is_active ? 'text-white' : '' }}">
                                                {{ $kategori->artikel }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- tag --}}
                        @if ($tags->count())
                            <div class="widget mt-30">
                                <h2 class="title">Popular Tag</h2>
                                <div class="tagcloud">
                                    @foreach ($tags as $tag)
                                        @php
                                            $is_active = $tag_selected ? $tag_selected->slug == $tag->slug : false;
                                            $rQuery = unsetByKey($request->query(), ['tag']);
                                        @endphp
                                        <a href="{{ route('artikel', $is_active ? $rQuery : array_merge($rQuery, ['tag' => $tag->slug])) }}"
                                            {!! $is_active ? 'class="bg-dark text-white"' : '' !!}>
                                            {{ $tag->nama }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($banner !== null)
                            <div class="widget border-0 p-0 mt-30">
                                <div class="widget_media_image">
                                    <img src="{{ $banner->fotoUrl() }}" alt="{{ $banner->nama }}">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->
@endsection
