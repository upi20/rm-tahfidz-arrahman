@extends('layouts.admin.master')

@section('content')
    @php
        $can_setting = auth_can(h_prefix('setting'));
        $can_delete = auth_can(h_prefix('delete'));
    @endphp
    <!-- Row -->
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">Data {{ $page_attr['title'] }}</h3>
        </div>
        <div class="card-body">
            @if ($can_setting)
                <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default active mb-2">
                        <div class="panel-heading " role="tab" id="headingOne1">
                            <h4 class="panel-title">
                                <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion2" href="#collapse2"
                                    aria-expanded="true" aria-controls="collapse2">
                                    Pengaturan
                                </a>
                            </h4>
                        </div>

                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne1">
                            <div class="panel-body">
                                <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="setting_form">

                                    <div class="form-group float-start me-2">
                                        <label for="setting_title">Judul</label>
                                        <input type="text" class="form-control" id="setting_title" name="title"
                                            value="{{ $setting->title }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_sub_title">Sub Judul</label>
                                        <input type="text" class="form-control" id="setting_sub_title" name="sub_title"
                                            value="{{ $setting->sub_title }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_name">Teks Nama</label>
                                        <input type="text" class="form-control" id="setting_name" name="name"
                                            value="{{ $setting->name }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_name_placeholder">Teks Nama Keterangan</label>
                                        <input type="text" class="form-control" id="setting_name_placeholder"
                                            name="name_placeholder" value="{{ $setting->name_placeholder }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_email">Teks Email</label>
                                        <input type="text" class="form-control" id="setting_email" name="email"
                                            value="{{ $setting->email }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_email_placeholder">Teks Email Keterangan</label>
                                        <input type="text" class="form-control" id="setting_email_placeholder"
                                            name="email_placeholder" value="{{ $setting->email_placeholder }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_message">Teks Pesan</label>
                                        <input type="text" class="form-control" id="setting_message" name="message"
                                            value="{{ $setting->message }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_message_placeholder">Teks Pesan Keterangan</label>
                                        <input type="text" class="form-control" id="setting_message_placeholder"
                                            name="message_placeholder" value="{{ $setting->message_placeholder }}">
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_button_text">Teks Tombol</label>
                                        <input type="text" class="form-control" id="setting_button_text"
                                            name="button_text" value="{{ $setting->button_text }}">
                                    </div>

                                </form>
                                <div style="clear: both"></div>
                                <button type="submit" form="setting_form" class="btn btn-rounded btn-md btn-info"
                                    data-toggle="tooltip" title="Simpan Setting" id="setting_btn_submit">
                                    <li class="fas fa-save mr-1"></li> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <table class="table table-striped" id="tbl_main">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dari</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        @if ($can_delete)
                            <th>Hapus</th>
                        @endif
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset_admin('plugins/fontawesome-free-5.15.4-web/css/all.min.css') }}">
@endsection

@section('javascript')
    <!-- DATA TABLE JS-->
    <script src="{{ asset_admin('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    {{-- sweetalert --}}
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    {{-- loading --}}
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js') }}"></script>

    <script>
        const table_html = $('#tbl_main');
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        $(document).ready(function() {
            // datatable ====================================================================================
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const new_table = table_html.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                // responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route(h_prefix()) }}",
                    data: function(d) {
                        // d['filter[status]'] = $('#filter_status').val();
                        // d['filter[type]'] = $('#filter_type').val();
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        render(data, type, full, meta) {
                            return `${data}<br><small>${full.email}</small>`;
                        },
                    },
                    {
                        data: 'message',
                        name: 'message',
                        render(data, type, full, meta) {
                            return `<small>${data}</small>`;
                        },
                    },
                    {
                        data: 'created',
                        name: 'created_at',
                        render(data, type, full, meta) {
                            const split = String(data).split(' ');
                            if (split.length == 2) {
                                return `${split[0]}<br><small>${split[1]}</small>`;
                            }
                            return `<small>${data}</small>`;
                        },
                    },
                    ...(can_delete ? [{
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i></button>` : '';
                            return btn_delete;
                        },
                        orderable: false
                    }] : []),
                ],
                order: [
                    [3, 'desc']
                ],
                language: {
                    url: datatable_indonesia_language_url
                }
            });

            new_table.on('draw.dt', function() {
                tooltip_refresh();
                var PageInfo = table_html.DataTable().page.info();
                new_table.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });

            @if ($can_setting)
                // insertForm ===================================================================================
                $('#setting_form').submit(function(e) {
                    e.preventDefault();
                    resetErrorAfterInput();
                    var formData = new FormData(this);
                    setBtnLoading('#setting_btn_submit', 'Simpan Perubahan');
                    $.ajax({
                        type: "POST",
                        url: "{{ route(h_prefix('setting')) }}",
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
                                title: 'Data saved successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        error: function(data) {
                            const res = data.responseJSON ?? {};
                            errorAfterInput = [];
                            for (const property in res.errors) {
                                errorAfterInput.push(property);
                                setErrorAfterInput(res.errors[property], `#${property}`);
                            }
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: res.message ?? 'Something went wrong',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        complete: function() {
                            setBtnLoading('#setting_btn_submit',
                                '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                                false);
                        }
                    });
                });
            @endif
        });

        function deleteFunc(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Apakah anda yakin akan menghapus data ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri()) }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Berhasil Menghapus Data',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            var oTable = table_html.dataTable();
                            oTable.fnDraw(false);
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }
    </script>
@endsection
