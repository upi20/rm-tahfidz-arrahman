@extends('templates.admin.master')

@section('content')
    <input type="text" id="clipboard" style="position: fixed; top:-50px">
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $can_setting = auth_can(h_prefix('setting'));
    @endphp
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">Data {{ $page_attr['title'] }}</h3>
            @if ($can_insert)
                <button type="button" class="btn btn-rounded btn-success btn-sm" data-bs-effect="effect-scale"
                    data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            @endif
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
                                    <label class="custom-switch form-switch">
                                        <input type="checkbox" name="visible" class="custom-switch-input"
                                            {{ $setting->visible ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Tampilkan Konten</span>
                                    </label>
                                    <br>
                                    <label class="custom-switch form-switch">
                                        <input type="checkbox" name="number" class="custom-switch-input"
                                            {{ $setting->number ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Tampilkan Nomor Urutan</span>
                                    </label>

                                    <div class="form-group">
                                        <label class="form-label" for="title">Judul<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Judul" value="{{ $setting->title }}" required />
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Sub Judul<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="sub_title" name="sub_title" class="form-control"
                                            placeholder="Sub Judul" value="{{ $setting->sub_title }}" required />
                                    </div>
                                </form>
                                <div style="clear: both"></div>
                                <button type="submit" form="setting_form" class="btn btn-rounded btn-md btn-info"
                                    data-toggle="tooltip" title="Simpan Setting" id="setting_btn_submit">
                                    <li class="fas fa-save mr-1"></li> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <table class="table table-striped" id="tbl_main">
                <thead>
                    <tr>
                        <th>Urutan</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        {!! $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>
    <!-- End Row -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label" for="urutan">Urutan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="urutan" name="urutan"
                                placeholder="Urutan Ditampilkan" required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="foto">Foto
                                <span class="badge bg-success" id="lihat-foto">Lihat</span>
                            </label>
                            <input type="file" class="form-control" id="foto" name="foto" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="keterangan">Keterangan
                                <span class="text-danger">*</span>
                            </label>
                            <textarea rows="3" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"
                                required=""></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Tutup
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

@section('stylesheet')
    <style>
        .table-foto {
            margin: auto;
            position: relative;
            margin: auto;
            width: 50px;
            height: 50px;
            border-radius: 4px;
            object-fit: cover;
            object-position: center;
            cursor: pointer;
        }
    </style>
@endsection
@section('javascript')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>

    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        const table_html = $('#tbl_main');
        let isEdit = true;
        const image_url = '{{ asset($image_folder) }}';
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
                responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route(h_prefix()) }}",
                    data: function(d) {
                        d['filter[tampilkan]'] = $('#filter_tampilkan').val();
                    }
                },
                columns: [{
                        data: 'urutan',
                        name: 'urutan',
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        render(data, type, full, meta) {
                            return data ? `
                            <img class="table-foto" src="${image_url}/${data}" alt="${full.nama}" onclick="viewImage('${data}', '${full.nama}')">
                            ` : '';
                        },
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        render(data, type, full, meta) {
                            return `<small>${data}</small>`;
                        },
                    },
                    ...(can_update || can_delete ? [{
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1 mt-1" data-toggle="tooltip" title="Ubah Data" onClick="editFunc('${data}')">
                                <i class="fas fa-edit"></i></button>` : '';
                            const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1 mt-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i></button>` : '';
                            return btn_update + btn_delete;
                        },
                        orderable: false
                    }] : []),
                ],
                order: [
                    [0, 'asc']
                ],
                language: {
                    url: datatable_indonesia_language_url
                }
            });

            new_table.on('draw.dt', function() {
                tooltip_refresh();
            });

            $('#FilterForm').submit(function(e) {
                e.preventDefault();
                var oTable = table_html.dataTable();
                oTable.fnDraw(false);
            });

            // insertForm ===================================================================================
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Save Changes');
                const route = ($('#id').val() == '') ?
                    "{{ route(h_prefix('insert')) }}" :
                    "{{ route(h_prefix('update')) }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-default").modal('hide');
                        var oTable = table_html.dataTable();
                        oTable.fnDraw(false);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        isEdit = true;

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
                        setBtnLoading('#btn-save',
                            '<li class="fas fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });

            $('#setting_form').submit(function(e) {
                const load_el = $(this).parent().parent();
                e.preventDefault();
                var formData = new FormData(this);
                load_el.LoadingOverlay("show");
                $.ajax({
                    type: "POST",
                    url: `{{ route(h_prefix('setting')) }}`,
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
                        $('#deskripsi_foto').attr('onclick',
                            `viewImage('${data.foto}', 'Foto Latar Belakang')`);
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
        });

        function add() {
            if (!isEdit) return false;
            $('#MainForm').trigger("reset");
            $('#modal-default-title').html("Tambah");
            $('#modal-default').modal('show');
            $('#id').val('');
            $('#foto').val('');
            $('#lihat-foto').hide();
            $('#foto').attr('required', '');
            resetErrorAfterInput();
            isEdit = false;
            return true;
        }

        function editFunc(id) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('find')) }}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id
                },
                success: (data) => {
                    isEdit = true;
                    $('#modal-default-title').html("Ubah");
                    $('#modal-default').modal('show');
                    $('#id').val(data.id);
                    $('#urutan').val(data.urutan);
                    $('#nama').val(data.nama);
                    $('#keterangan').val(data.keterangan);
                    $('#lihat-foto').fadeIn();
                    $('#lihat-foto').attr('onclick', `viewImage('${data.foto}', '${data.nama}')`);
                    $('#foto').removeAttr('required');
                    $('#foto').val('');
                },
                error: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                }
            });

        }

        function deleteFunc(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
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
                                title: '{{ $page_attr['title'] }} deleted successfully',
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

        function viewImage(image, title) {
            $('#modal-image').modal('show');
            $('#modal-image-title').html(title);
            const ele = $('#modal-image-element');
            ele.attr('src', `${image_url}/${image}`);
            ele.attr('alt', title);
        };
    </script>
@endsection
