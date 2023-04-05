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

    <!-- About section start here -->
    <section class="about-section padding-tb shape-4">
        <div class="container">
            <h3 class="title">Formulir Pendaftaran</h3>
            <br>
            <form class="account-form" id="mainForm">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin*</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir*</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap*</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" required rows="3"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_whatsapp" class="col-sm-2 col-form-label">No Whatsapp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp">
                    </div>
                </div>

                <p>Keterangan: *Wajib di Isi</p>

                <div class="form-group">
                    <button class="d-block lab-btn" type="submit"><span>Kirim</span></button>
                </div>
            </form>
        </div>
    </section>
    <!-- About section end here -->
@endsection

@section('stylesheet')
    <style>
        .form-control {
            border-style: solid;
            width: 100%;
            border-width: 1px;
            border-color: #f0f0f0;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            background: #fff;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.06);
            padding: 10px 15px;
        }
    </style>
@endsection

@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tanggal_lahir').change(function() {
                render_tanggal(this)
            });

            $('#mainForm').submit(function(e) {
                const form = this;
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit]', `Mengirim...`);
                $.ajax({
                    type: "POST",
                    url: "{{ route('pendaftaran.send') }}",
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
                            title: 'Formulir berhasil dikirim !',
                            showConfirmButton: true,
                        })
                        $(form).trigger("reset");
                        setBtnLoading('button[type=submit]', `Kirim`, false);
                        render_tanggal('#tanggal_lahir');
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setBtnLoading('button[type=submit]', `Kirim`, false);
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit]', `Kirim`, false);
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


        function format_tanggal(tanggal_input) {
            if (tanggal_input == '') {
                return {
                    tanggal: '',
                    waktu: ''
                }
            }
            var date = new Date(tanggal_input);
            var tahun = date.getFullYear();
            var bulan = date.getMonth();
            var tanggal = date.getDate();
            var hari = date.getDay();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();
            switch (hari) {
                case 0:
                    hari = "Minggu";
                    break;
                case 1:
                    hari = "Senin";
                    break;
                case 2:
                    hari = "Selasa";
                    break;
                case 3:
                    hari = "Rabu";
                    break;
                case 4:
                    hari = "Kamis";
                    break;
                case 5:
                    hari = "Jum'at";
                    break;
                case 6:
                    hari = "Sabtu";
                    break;
            }
            switch (bulan) {
                case 0:
                    bulan = "Januari";
                    break;
                case 1:
                    bulan = "Februari";
                    break;
                case 2:
                    bulan = "Maret";
                    break;
                case 3:
                    bulan = "April";
                    break;
                case 4:
                    bulan = "Mei";
                    break;
                case 5:
                    bulan = "Juni";
                    break;
                case 6:
                    bulan = "Juli";
                    break;
                case 7:
                    bulan = "Agustus";
                    break;
                case 8:
                    bulan = "September";
                    break;
                case 9:
                    bulan = "Oktober";
                    break;
                case 10:
                    bulan = "November";
                    break;
                case 11:
                    bulan = "Desember";
                    break;
            }

            const tanggal_str = hari + ", " + tanggal + " " + bulan + " " + tahun;
            const waktu = jam + ":" + menit + ":" + detik;
            return {
                tanggal: tanggal_str,
                waktu
            }
        }

        function render_tanggal(e) {
            const tanggal = format_tanggal($(e).val()).tanggal;
            if ($(e).next().is('small')) {
                $(e).next().html(tanggal);
            } else {
                $(`<small>${tanggal}</small>`).insertAfter(e);
            }
        }
    </script>
@endsection
