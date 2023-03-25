@extends('templates.frontend2.master')
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
                    <h2 class="page-title">{{ $routeTitle }} Detail</h2>
                    <div class="cafena-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center">
                            <li class="cafenabcrumb-item duxinbcrumb-begin">
                                <a href="{{ route('home') }}"><span>Home</span></a>
                            </li>
                            <li class="cafenabcrumb-item duxinbcrumb-begin">
                                <a href="{{ route('artikel') }}"><span>{{ $routeTitle }}</span></a>
                            </li>
                            <li class="cafenabcrumb-item duxinbcrumb-end">
                                <span>Detail</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- blog area start -->
    <div class="blog-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog__wrapper blog__wrapper--single">
                        <article class="blog__post blog__post--single format format-image">
                            {{-- Title --}}
                            <h2 class="title">{{ $model->nama }}</h2>

                            {{-- tag meta --}}
                            <ul class="meta mt-10 list-unstyled d-flex align-items-center">
                                @foreach ($model->categories as $kategori)
                                    <li>
                                        <a href="{{ url("artikel?kategori=$kategori->slug") }}">
                                            <i class="fal fa-file"></i> {{ $kategori->nama }}
                                        </a>
                                    </li>
                                @endforeach
                                @if ($model->user)
                                    <li>
                                        <a href="javascript:void(0)">
                                            {{-- <img src="{{ $model->user->fotoUrl() }}"
                                                onerror="this.src='{{ $model->user->fotoUrlDefault() }}';this.onerror='';"
                                                class="author"
                                                style="width: 20px; height: 20px; object-fit: cover; border-radius: 50%;"
                                                alt="{{ $model->user->name }}" /> --}}
                                            <i class="fas fa-user"></i>
                                            <span style="margin-left: 8px">
                                                {{ $model->user->name }}
                                            </span>
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fal fa-calendar-alt"></i>
                                        {{ $model->dateFormat() }}
                                    </a>
                                </li>
                            </ul>

                            {{-- Artikel detail --}}
                            {!! $model->detail !!}

                            {{-- social media wrapper --}}
                            <div class="tag-social-wrapper mt-30">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Releted Tags</h4>
                                        <div class="tagcloud">
                                            @foreach ($model->tags as $tag)
                                                <a href="{{ url("artikel?tag=$tag->slug") }}">
                                                    {{ $tag->nama }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6 social-share-wrapper text-left text-md-end">
                                        <h4>Social Share</h4>
                                        <div class="social-share">
                                            <a target="_blank"
                                                href="https://www.facebook.com/sharer.php?u={{ route('artikel', $model->slug) }}"
                                                title="Share To Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a target="_blank"
                                                href="https://api.whatsapp.com/send?text={{ route('artikel', $model->slug) }} {{ $model->nama }}"
                                                title="Share To Whatsapp">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                            <a target="_blank"
                                                href="https://twitter.com/share?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                                                title="Share To Twitter">
                                                <i class="fab fa-twitter"></i></a>
                                            <a target="_blank"
                                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('artikel', $model->slug) }}&title={{ $model->nama }}&summary={{ $model->excerpt }}"
                                                title="Share To Linkedin">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a target="_blank"
                                                href="https://pinterest.com/pin/create/button/?url={{ route('artikel', $model->slug) }}&media={{ asset($model->foto) }}&description={{ $model->nama }}"
                                                title="Share To Pinterest">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                            <a target="_blank"
                                                href="https://telegram.me/share/url?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                                                title="Share To Telegram">
                                                <i class="fab fa-telegram-plane"></i>
                                            </a>
                                            <a target="_blank"
                                                href="mailto:?subject={{ $model->nama }}&body=Check out this site: {{ route('artikel', $model->slug) }}"
                                                title="Share by Email';" title="Share Via Email">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- lates and new artikel --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="navigation-border pt-45 mt-45"></div>
                                </div>
                                <div class="col-xl-5 col-md-5">
                                    <div class="cafena-navigation b-next-post text-start">
                                        @if ($prev_post)
                                            <h4>
                                                <a href="{{ route('artikel.detail', $prev_post->slug) }}">
                                                    Prev Post
                                                </a>
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-2 my-auto">
                                    <div class="blog-filter text-left text-md-center">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('assets/templates/frontend2/images/icons/filter.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-5">
                                    <div class="cafena-navigation b-next-post text-end">
                                        @if ($next_post)
                                            <h4>
                                                <a href="{{ route('artikel.detail', $next_post->slug) }}">
                                                    Next Post
                                                </a>
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="navigation-border pt-45 mt-45"></div>
                                </div>
                            </div>

                            {{-- coment --}}
                            <div class="post-comments">
                                <!-- post comments -->
                                <div id="disqus_thread"></div>
                                <script>
                                    /**
                                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                                    var disqus_config = function() {
                                        this.page.url = '{{ Request::url() }}'; // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier =
                                            '{{ $model->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document,
                                            s = d.createElement('script');
                                        s.src = 'https://wkg-roastery.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>
                                    Please enable JavaScript to view the
                                    <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                                </noscript>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog__sidebar mt-none-30">
                        <div class="widget mt-30">
                            <h2 class="title">Pencarian</h2>
                            <form action="{{ route('artikel') }}" class="search-widget" method="GET">
                                @foreach ($rQuery ?? [] as $name => $value)
                                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                                @endforeach
                                <input type="search" name="search" id="search" placeholder="Kata Kunci"
                                    value="{{ request()->search }}">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>

                        {{-- tag --}}
                        @if ($tags->count())
                            <div class="widget mt-30">
                                <h2 class="title">Popular Tag</h2>
                                <div class="tagcloud">
                                    @foreach ($tags as $tag)
                                        <a href="{{ route('artikel', ['tag' => $tag->slug]) }}" {!! in_array($tag->id, $model->parseId($model->tags)) ? 'class="bg-dark text-white"' : '' !!}>
                                            {{ $tag->nama }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- kategori --}}
                        @if ($categories->count())
                            <div class="widget mt-30">
                                <h2 class="title">Kategori</h2>
                                <ul>
                                    @foreach ($categories as $kategori)
                                        @php
                                            $is_active = in_array($kategori->id, $model->parseId($model->categories));
                                        @endphp
                                        <li class="{{ $is_active ? 'bg-dark' : '' }} cat-item">
                                            <a href="{{ route('artikel', ['kategori' => $kategori->slug]) }}"
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

                        @if ($banner !== null)
                            <div class="widget border-0 p-0 mt-30">
                                <div class="widget_media_image">
                                    <img src="{{ $banner->fotoUrl() }}" alt="{{ $banner->nama }}">
                                </div>
                            </div>
                        @endif

                        {{-- artikel --}}
                        @if ($article_catategory->count())
                            <div class="widget mt-30">
                                <h2 class="title">Artikel Lain</h2>
                                <div class="recent-posts">
                                    @foreach ($article_catategory as $artikel)
                                        <div class="item d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{ $artikel->fotoUrl() }}" alt="{{ $artikel->nama }}">
                                            </div>
                                            <div class="content">
                                                <h5 class="rp-title border-effect">
                                                    <a href="{{ route('artikel.detail', $artikel->slug) }}">
                                                        {{ $artikel->nama }}
                                                    </a>
                                                </h5>
                                                <a href="{{ route('artikel.detail', $artikel->slug) }}" class="date">
                                                    <i class="fal fa-calendar-alt"></i>{{ $artikel->dateFormat() }}
                                                </a>
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
    </div>
    <!-- blog area end -->
@endsection

@section('stylesheet')
    <style>
        .blogCard a {
            color: #0d6efd !important;
            text-decoration: underline;
        }
    </style>
@endsection

@section('javascript')
    <script id="dsq-count-scr" src="//wkg-roastery.disqus.com/count.js" async></script>
@endsection
