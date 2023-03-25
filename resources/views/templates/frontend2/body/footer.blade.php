<footer class="site-footer dark-bg position-relative">
    <div class="footer__top">
        <a href="#" class="go-top go-top__white position-absolute d-flex align-items-center justify-content-center">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>
    <div class="footer__middle mt-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="d-flex d-lg-block align-items-center justify-content-center">
                        <div class="footer__logo--content">
                            <img style="height: 100px;"
                                src="{{ asset(settings()->get(set_front('app.foto_light_mode'))) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 align-self-end">
                    <div class="d-flex d-lg-block align-items-center justify-content-center">
                        <div class="social-links d-flex align-items-center justify-content-lg-end">
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
    <div class="footer__menu-area mt-30 pb-90">
        <div class="container">
            <p>{{ settings()->get(set_front('app.copyright')) }}</p>
        </div>
    </div>
</footer>
