@extends('templates.admin.master')

@section('content')
    <div class="grid">
        <div class="grid-sizer col-md-6 col-lg-4"></div>

        {{-- hero --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'hero';
                $title = 'Bagian Utama';
            @endphp
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">{{ $title }}</h3>
                    <label class="custom-switch form-switch">
                        <input type="checkbox" name="visible" form="{{ $name }}-form" class="custom-switch-input"
                            {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Tampilkan</span>
                    </label>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="{{ $name }}-form" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.judul") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.judul") }}" name="judul" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.judul")) }}" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_judul") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_judul") }}" name="sub_judul" class="form-control"
                                placeholder="Sub Judul" value="{{ settings()->get($s("$name.sub_judul")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.tombol_title") }}">Tombol Teks
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.tombol_title") }}" name="tombol_title"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.tombol_title")) }}" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.tombol_link") }}">Tombol Link
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.tombol_link") }}" name="tombol_link"
                                class="form-control" placeholder="Tombol Link"
                                value="{{ settings()->get($s("$name.tombol_link")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.video_title") }}">Nama Video
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.video_title") }}" name="video_title"
                                class="form-control" placeholder="Nama Video Yoututbe"
                                value="{{ settings()->get($s("$name.video_title")) }}" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.video_link") }}">Link Video
                                <span class="text-danger">*</span></label>
                            <input type="url" id="{{ $s("$name.video_link") }}" name="video_link" class="form-control"
                                placeholder="Link Video Yoututbe" value="{{ settings()->get($s("$name.video_link")) }}"
                                required />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Foto
                                <span class="badge bg-primary" id="foto"
                                    onclick='viewImage(`{{ settings()->get($s("$name.foto")) }}`, `{{ $title }} Image View`)'>
                                    Lihat
                                </span>
                            </label>
                            <input type="file" accept="image/*" id="{{ "$name.foto" }}" name="foto"
                                class="form-control" />
                        </div>
                    </form>

                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                </div>
            </div>
        </div>

        {{-- About --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'about';
                $title = 'Tentang';
            @endphp
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Pengaturan {{ $title }} </h3>
                    <label class="custom-switch form-switch">
                        <input type="checkbox" name="visible" form="{{ $name }}-form" class="custom-switch-input"
                            {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Tampilkan</span>
                    </label>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="{{ $name }}-form" enctype="multipart/form-data">
                        {{-- deskripsi 1 --}}
                        <div class="form-group">
                            <label class="form-label">Foto 1
                                <span class="badge bg-primary" id="deskripsi_foto_1"
                                    onclick='viewImage(`{{ settings()->get($s("$name.foto1")) }}`, `{{ $title }} Image View`)'>
                                    Lihat
                                </span>
                            </label>
                            <input type="file" accept="image/*" id="{{ "$name.foto1" }}" name="foto1"
                                class="form-control" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Foto 2
                                <span class="badge bg-primary" id="deskripsi_foto_2"
                                    onclick='viewImage(`{{ settings()->get($s("$name.foto2")) }}`, `{{ $title }} Image View`)'>
                                    Lihat
                                </span>
                            </label>
                            <input type="file" accept="image/*" id="{{ "$name.foto2" }}" name="foto2"
                                class="form-control" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.judul") }}">
                                Judul <span class="text-danger">*</span>
                            </label>
                            <input type="tex" id="{{ $s("$name.judul") }}" name="judul" class="form-control"
                                required placeholder="Judul " value="{!! settings()->get($s("$name.judul")) !!}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_judul") }}">
                                Sub Judul <span class="text-danger">*</span>
                            </label>
                            <input type="tex" id="{{ $s("$name.sub_judul") }}" name="sub_judul"
                                class="form-control" required placeholder="Sub Judul " value="{!! settings()->get($s("$name.sub_judul")) !!}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.deskripsi") }}">
                                Deskripsi <span class="text-danger">*</span>
                            </label>
                            <textarea id="{{ $s("$name.deskripsi") }}" name="deskripsi" class="form-control" required rows="3"
                                placeholder="Deskripsi ">{!! settings()->get($s("$name.deskripsi")) !!}</textarea>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                </div>
            </div>
        </div>

        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'katalog';
                $title = 'Katalog';
            @endphp
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Pengaturan {{ $title }} </h3>
                    <label class="custom-switch form-switch">
                        <input type="checkbox" name="visible" form="{{ $name }}-form"
                            class="custom-switch-input" {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Tampilkan</span>
                    </label>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="{{ $name }}-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                </div>
            </div>
        </div>

        {{-- artikel --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'artikel';
                $title = 'Artikel';
            @endphp
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Pengaturan {{ $title }} </h3>
                    <label class="custom-switch form-switch">
                        <input type="checkbox" name="visible" form="{{ $name }}-form"
                            class="custom-switch-input" {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Tampilkan</span>
                    </label>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="{{ $name }}-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_text") }}">Teks Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_text") }}" name="button_text"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.button_text")) }}" required />
                        </div>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-image-title">View Foto</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modal-image-element" alt="Icon Pendaftaran">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{-- nestable --}}
    <script src="{{ asset('assets/templates/admin/plugins/nestable2v1.6.0/jquery.nestable.min.js') }}"></script>
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    {{-- select2 --}}
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- mansory --}}
    <script src="{{ asset('assets/templates/admin/plugins/mansory.min.js') }}"></script>

    <script>
        let meta_list_is_edit = true;
        const meta_list = new Map();
        $(document).ready(function() {
            var msnry = new Masonry(document.querySelector('.grid'), {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer'
            });

            // About ==================================================================================================
            $('#about-form').submit(function(e) {
                const load_el = $(this).parent().parent();
                e.preventDefault();
                var formData = new FormData(this);
                load_el.LoadingOverlay("show");
                $.ajax({
                    type: "POST",
                    url: `{{ route(h_prefix('about')) }}`,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        // set foto
                        $('#deskripsi_foto_1').attr('onclick',
                            `viewImage('${data.foto1}', 'Foto Deskripsi 1')`);
                        $('#deskripsi_foto_2').attr('onclick',
                            `viewImage('${data.foto2}', 'Foto Deskripsi 2')`);
                        load_el.find('input[type=file]').val('');
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        load_el.LoadingOverlay("hide");
                    }
                });
            });

            // About ==================================================================================================
            $('#terima_kasih-form').submit(function(e) {
                const load_el = $(this).parent().parent();
                e.preventDefault();
                var formData = new FormData(this);
                load_el.LoadingOverlay("show");
                $.ajax({
                    type: "POST",
                    url: `{{ route(h_prefix('terima_kasih')) }}`,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        // set image
                        $('#terima_kasih_image').attr('onclick',
                            `viewImage('${data.foto}', 'Foto Latar Belakang Terima Kasih')`);
                        $('#terima_kasih_image_logo').attr('onclick',
                            `viewImage('${data.image_logo}', 'Foto Logo Terima Kasih')`);
                        load_el.find('input[type=file]').val('');
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        load_el.LoadingOverlay("hide");
                    }
                });
            });

            // Hero ===================================================================================================
            $('#hero-form').submit(function(e) {
                const load_el = $(this).parent().parent();
                e.preventDefault();
                var formData = new FormData(this);
                load_el.LoadingOverlay("show");
                $.ajax({
                    type: "POST",
                    url: `{{ route(h_prefix('hero')) }}`,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        // set foto
                        $('#deskripsi_foto_1').attr('onclick',
                            `viewImage('${data.foto}', 'Hero Image View')`);
                        $(this).find('input[name=file]').val('');
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        load_el.LoadingOverlay("hide");
                    }
                });
            });

            // Galeri Kegiatan ========================================================================================
            $('#katalog-form').submit(function(e) {
                const load_el = $(this).parent().parent();
                e.preventDefault();
                var formData = new FormData(this);
                load_el.LoadingOverlay("show");
                $.ajax({
                    type: "POST",
                    url: `{{ route(h_prefix('katalog')) }}`,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        load_el.LoadingOverlay("hide");
                    }
                });
            });

            // Artikel Kegiatan =======================================================================================
            $('#artikel-form').submit(function(e) {
                const load_el = $(this).parent().parent();
                e.preventDefault();
                var formData = new FormData(this);
                load_el.LoadingOverlay("show");
                $.ajax({
                    type: "POST",
                    url: `{{ route(h_prefix('artikel')) }}`,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        load_el.LoadingOverlay("hide");
                    }
                });
            });
        })

        function viewImage(image, title) {
            $('#modal-image').modal('show');
            $('#modal-image-title').html(title);
            const ele = $('#modal-image-element');
            ele.attr('src', `{{ url('') }}${image}`);
            ele.attr('alt', title);
        };
    </script>
@endsection
