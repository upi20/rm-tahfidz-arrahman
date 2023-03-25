@extends('templates.frontend.master')
@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area pt-140 pb-140 bg_img"
        data-background="{{ asset('assets/templates/frontend/images/bg/breadcrumb-bg-1.jpeg') }}" data-overlay="dark"
        data-opacity="5" style="height: auto;">
        <div class="shape shape__1">
            <img src="{{ asset('assets/templates/frontend/images/shape/breadcrumb-shape-1.png') }}" alt="">
        </div>
        <div class="shape shape__2">
            <img src="{{ asset('assets/templates/frontend/images/shape/breadcrumb-shape-2.png') }}" alt="">
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

    <!-- contact area start -->
    <div class="contact__area position-relative pt-120 pb-120">
        <span class="shape shape__1 position-absolute">
            <img src="{{ asset('assets/templates/frontend/images/shape/hero-shape-2-1.png') }}" alt="">
        </span>
        <span class="shape shape__2 position-absolute">
            <img src="{{ asset('assets/templates/frontend/images/shape/hero-shape-2-2.png') }}" alt="">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact__wrapper">
                        <div class="row mt-none-30">
                            @foreach ($contacts as $v)
                                <div class="col-lg-4 col-md-6 mt-30">
                                    <div class="contact-info d-flex align-items-center justify-content-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class="{{ $v->icon }}" style="font-size: 2em"></i>
                                        </div>
                                        <div class="content">
                                            <h3 class="title">{{ $v->nama }}</h3>
                                            <a href="{!! $v->url !!}">{!! $v->keterangan !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact__form mt-20">
                                    <form action="#" id="message_form">
                                        <div class="row">
                                            <div class="col-xl-12 mt-30">
                                                <div class="form-group">
                                                    <input type="text" name="nama" id="nama" required
                                                        placeholder="{{ settings()->get('setting.contact.message.name_placeholder') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-30">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" required
                                                        placeholder="{{ settings()->get('setting.contact.message.email_placeholder') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-30">
                                                <div class="form-group">
                                                    <textarea name="message" id="message" required
                                                        placeholder="{{ settings()->get('setting.contact.message.message_placeholder') }}"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-20 text-center">
                                                <button type="submit" class="site-btn">send massage</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection

@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#message_form').submit(function(e) {
                const form = this;
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit]',
                    `Sending...`);
                $.ajax({
                    type: "POST",
                    url: "{{ route('kontak.send') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Message send successfully',
                            showConfirmButton: true,
                            timer: 4500
                        })
                        $(form).trigger("reset");
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit]',
                            `{{ settings()->get('setting.contact.message.button_text') }}`,
                            false);
                    }
                });
            });
        });

        function setBtnLoading(element, text, status = true) {
            const el = $(element);
            if (status) {
                el.attr("disabled", "");
                el.html(
                    `<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true">
                                </span> <span>${text}</span>`
                );
            } else {
                el.removeAttr("disabled");
                el.html(text);
            }
        }
    </script>
@endsection
