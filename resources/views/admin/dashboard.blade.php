@extends('templates.admin.master')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Halaman Utama</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.pendaftaran.santri') }}">
                <div class="card bg-warning img-card box-warning-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_pendaftar }}</h2>
                                <p class="text-white mb-0">Jumlah Pendaftaran </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-user-edit text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.artikel.data') }}">
                <div class="card bg-secondary img-card box-secondary-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_artikel }}</h2>
                                <p class="text-white mb-0">Jumlah Artikel </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-file-alt text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.kontak.message') }}">
                <div class="card bg-info img-card box-info-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">{{ $total_pesan }}</h2>
                                <p class="text-white mb-0">Jumlah Pesan Diterima </p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-envelope text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('admin.password') }}">
                <div class="card  bg-success img-card box-success-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h3 class="mb-0 number-font">Ganti Password</h3>
                                <p class="text-white mb-0"><br></p>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-key text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="card mt-3" id="penghitung-container">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <div>
                <h3 class="card-title mb-1">Penghitung Pengunjung</h3>
            </div>
            <div class="d-flex flex-row">
                <div id="datepicker"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="chart-pengunjung" class="chartsh"></div>
        </div>
    </div>
@endsection

@section('stylesheet')
    <style>
        .card-main {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            margin: 3px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/charts-c3/d3.v5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/charts-c3/c3-chart.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            var start = moment().startOf('month');
            var end = moment().endOf('month');

            function cb(start, end) {
                $('#datepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                const date_start = start.format('YYYY-MM-DD');
                const date_end = end.format('YYYY-MM-DD');
                refreshVistor({
                    start: date_start,
                    end: date_end
                });
            }

            $('#datepicker').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Hari Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan kemarin': [moment().subtract(1, 'month').startOf('month'),
                        moment().subtract(1, 'month').endOf('month')
                    ],
                }
            }, cb);

            cb(start, end);

            $('#datepicker').on('apply.daterangepicker', function(ev, picker) {
                global_date_start = picker.startDate.format('YYYY-MM-DD');
                global_date_end = picker.endDate.format('YYYY-MM-DD');
            });
        });

        function refreshVistor(tanggal) {
            console.log(tanggal);
            const container = $('#penghitung-container');
            container.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "{{ route(h_prefix('vistor_counter')) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: tanggal,
                success: (data) => {
                    console.log(data);
                    renderChart(data);
                    container.LoadingOverlay("hide");
                },
                error: function(data) {
                    console.log(data);
                    container.LoadingOverlay("hide");
                },
                complete: function() {
                    container.LoadingOverlay("hide");
                }
            });
        }

        function renderChart(datas) {
            const columns = ['data1'];
            const categories = [];

            datas.forEach(e => {
                columns.push(e.value);
                categories.push(e.title);
            })

            var chart = c3.generate({
                bindto: '#chart-pengunjung', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        columns
                    ],
                    type: 'bar', // default type of chart
                    colors: {
                        data1: '#6c5ffc'
                    },
                    names: {
                        // name of each serie
                        'data1': 'Pengunjung'
                    },
                    labels: true,
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: categories
                    },
                },
                // bar: {
                //     width: 16
                // },
                legend: {
                    show: false, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        }
    </script>
@endsection
