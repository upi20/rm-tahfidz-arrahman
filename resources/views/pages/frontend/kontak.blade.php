@extends('layouts.frontend.master')
@section('content')
    <!-- Page Header Section Start Here -->
    <section class="page-header bg_img padding-tb">
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header-content-area">
                <h4 class="ph-title">{{ $routeTitle }}</h4>
                <ul class="lab-ul">
                    <li><a href="{{ url('') }}">Utama</a></li>
                    <li><a class="active">{{ $routeTitle }}</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <!-- Contact Us Section Start Here -->
    <div class="contact-section">
        <div class="contact-top padding-tb aside-bg padding-b">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <article class="contact-form-wrapper">
                            <div class="contact-form">
                                <h4>{{ settings()->get('setting.contact.message.title') }}</h4>
                                <p class="mb-5">
                                    {{ settings()->get('setting.contact.message.sub_title') }}
                                </p>
                                <form action="#" method="POST" id="message_form" class="comment-form">
                                    <input type="text" name="nama" id="nama" class=""
                                        placeholder="{{ settings()->get('setting.contact.message.name_placeholder') }}"
                                        required>
                                    <input type="email" name="email" id="email" class=""
                                        placeholder="{{ settings()->get('setting.contact.message.email_placeholder') }}"
                                        required>
                                    <textarea name="message" id="message" cols="30" rows="9"
                                        placeholder="{{ settings()->get('setting.contact.message.message_placeholder') }}" required></textarea>
                                    <button type="submit" class="lab-btn">
                                        <span>{{ settings()->get('setting.contact.message.button_text') }}</span>
                                    </button>
                                </form>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-4">
                        <div class="contact-info-wrapper">
                            <div class="contact-info-title">
                                <h5>Kontak Kami</h5>
                                <p>Daftar kontak kami yang bisa di hubungi:</p>
                            </div>
                            <div class="contact-info-content">

                                @foreach ($contacts as $v)
                                    <div class="contact-info-item">
                                        <div class="contact-info-inner">
                                            <div class="contact-info-thumb">
                                                <i class="{{ $v->icon }}" style="font-size: 2em"></i>
                                            </div>
                                            <div class="contact-info-details">
                                                <span class="fw-bold">{{ $v->nama }}</span>
                                                <p> <a href="{!! $v->url !!}">{!! $v->keterangan !!}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Section ENding Here -->
@endsection

@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#message_form').submit(function(e) {
                const form = this;
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit]',
                    `Mengirim...`);
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
                            title: 'Pesan berhasil dikirim !',
                            showConfirmButton: true,
                            timer: 4500
                        })
                        $(form).trigger("reset");
                        setBtnLoading('button[type=submit]',
                            `{{ settings()->get('setting.contact.message.button_text') }}`,
                            false);
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setBtnLoading('button[type=submit]',
                            `{{ settings()->get('setting.contact.message.button_text') }}`,
                            false);
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
