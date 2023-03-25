@extends('templates.admin.master')

@section('content')
    @php
        $prefix_count = $isEdit ? 2 : 1;
        $can_save = $isEdit ? auth_can(h_prefix('insert', $prefix_count)) : auth_can(h_prefix('update', $prefix_count));
    @endphp
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">Form {{ $page_attr['title'] }}</h3>
            <a class="btn btn-rounded btn-secondary btn-sm" href="{{ route('admin.produk') }}">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data" id="MainForm">
                <input type="hidden" name="id" id="produk_id" value="{{ $produk->id }}" />
                <input type="hidden" name="isEdit" id="produk_isEdit" value="{{ $isEdit ? 1 : 0 }}" />
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="produk_nama">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="produk_nama" class="form-control"
                                placeholder="Nama Produk" value="{{ $produk->nama }}" required />
                        </div>
                        <div class="form-group">
                            <label for="produk_kilasan">Kilasan Produk:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="kilasan" id="produk_kilasan" class="form-control" placeholder="Kilasan Produk" required>{{ $produk->kilasan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="produk_informasi_lain">Informasi Lain:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea class="summernote" name="informasi_lain" id="produk_informasi_lain" required>{{ $produk->informasi_lain }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group d-none">
                            <label for="produk_sku">Produk SKU</label>
                            <input type="text" name="sku" id="produk_sku" class="form-control"
                                placeholder="Produk SKU" value="{{ $produk->sku }}" />
                        </div>
                        <div class="form-group">
                            <label for="produk_kategori_id">Kategori Produk
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2" id="produk_kategori_id" name="kategori_id"
                                style="width: 100%" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $k->id == $produk->kategori_id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="produk_tampilkan_harga">Tampilkan Harga
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="produk_tampilkan_harga" name="tampilkan_harga" required>
                                <option value="1" {{ $produk->tampilkan_harga ? 'selected' : '' }}>
                                    Tampilkan
                                </option>
                                <option value="0" {{ $produk->tampilkan_harga ? '' : 'selected' }}>
                                    Sembunyikan
                                </option>
                            </select>
                        </div>
                        <div id="row-harga" {!! $produk->tampilkan_harga ? '' : 'style="display:none"' !!}>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="produk_harga">Harga Normal
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" min="0" name="harga" id="produk_harga"
                                            class="form-control" placeholder="Harga Normal" value="{{ $produk->harga }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="produk_harga_diskon">Harga Diskon</label>
                                        <input type="number" name="harga_diskon" id="produk_harga_diskon"
                                            class="form-control" placeholder="Harga Diskon"
                                            value="{{ $produk->harga_diskon }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="produk_status_stok">Stok Produk
                            </label>
                            <select class="form-control select2" id="produk_status_stok" name="status_stok"
                                style="width: 100%" required>
                                <option value="1" {{ $produk->status_stok ? 'selected' : '' }}>Ada</option>
                                <option value="0" {{ $produk->status_stok ? '' : 'selected' }}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="produk_rating">Rating</label>
                                    <input type="number" min="1" max="5" name="rating"
                                        id="produk_rating" class="form-control" placeholder="Rating"
                                        value="{{ $produk->rating == 0 ? '' : $produk->rating }}" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="produk_rating_nama">Nama Rating</label>
                                    <input type="text" name="rating_nama" id="produk_rating_nama"
                                        class="form-control" placeholder="Nama Rating"
                                        value="{{ $produk->rating_nama }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="produk_tampilkan_di_halaman_utama">Tampilkan di halaman utama
                            </label>
                            <select class="form-control select2" id="produk_tampilkan_di_halaman_utama"
                                name="tampilkan_di_halaman_utama" style="width: 100%" required>
                                <option value="0" {{ $produk->tampilkan_di_halaman_utama ? '' : 'selected' }}>
                                    Tidak
                                </option>
                                <option value="1" {{ $produk->tampilkan_di_halaman_utama ? 'selected' : '' }}>
                                    Ya
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-success" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan
                </button>
            </div>
        </div>
    </div>

    {{-- data tambahan --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Data Foto Produk</h3>
                    <button type="button" class="btn btn-rounded btn-success btn-sm" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-foto" onclick="foto_insert()" data-target="#modal-foto">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="tbl_foto">
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Data Marketplace Produk</h3>
                    <button type="button" class="btn btn-rounded btn-success btn-sm" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-marketplace" onclick="marketplace_insert()"
                        data-target="#modal-marketplace">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="tbl_marketplace">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Marketplace</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal foto crud --}}
    <div class="modal fade" id="modal-foto">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-foto-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="FotoForm" name="FotoForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="foto_id">
                        <input type="hidden" name="produk_id" id="foto_produk_id" value="{{ $produk->id }}">
                        <div class="form-group">
                            <label class="form-label" for="foto_urutan">Urutan<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="foto_urutan" name="urutan"
                                placeholder="Urutan" required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="foto_nama">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="foto_nama" name="nama" placeholder="Nama"
                                required="" />
                        </div>
                        <div class="form-group">
                            <div class="mb-2">
                                <label class="form-label d-inline" for="foto_foto">Foto</label>
                                <span class="badge bg-success" id="lihat-foto_foto">Lihat</span>
                            </div>
                            <input type="file" class="form-control" id="foto_foto" name="foto" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="FotoForm">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal view foto --}}
    <div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-image-title">View Foto</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modal-image-element" alt="">
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

    {{-- modal marketplace crud --}}
    <div class="modal fade" id="modal-marketplace">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-marketplace-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MarketplaceForm" name="MarketplaceForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="marketplace_id">
                        <input type="hidden" name="produk_id" id="marketplace_produk_id" value="{{ $produk->id }}">
                        <div class="form-group">
                            <label for="marketplace_jenis_id">Marketplace
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="marketplace_jenis_id" name="jenis_id" style="width: 100%"
                                required>
                                <option value="">Pilih Marketplace</option>
                                @foreach ($marketplaceJenis as $marketplace)
                                    <option value="{{ $marketplace->id }}"> {{ $marketplace->nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="marketplace_link">Link Produk</label>
                            <input type="text" class="form-control" id="marketplace_link" name="link"
                                placeholder="Link Produk" />
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MarketplaceForm">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
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
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/summernote/summernote1.js') }}"></script>

    <script>
        const isEdit = {{ $isEdit ? 'true' : 'false' }};
        let isEditFoto = true;
        let isEditMarketplace = true;
        const table_html_foto = $('#tbl_foto');
        const table_html_marketplace = $('#tbl_marketplace');
        $(document).ready(function() {
            $('#produk_tampilkan_harga').change(function() {
                const harga = $('#row-harga');
                if (this.value == 1) harga.fadeIn();
                else harga.fadeOut();
            });

            $('.select2').select2();
            $('#marketplace_jenis_id').select2({
                dropdownParent: $('#modal-marketplace'),
            });
            // init summernote
            $('.summernote').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['style',
                        ['bold',
                            'italic',
                            'underline',
                            'strikethrough',
                            'superscript',
                            'subscript',
                            'clear'
                        ]
                    ],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['color', ['color']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']],
                    ['table', ['table']],
                    ['insert', ['link', 'unlink', 'audio', 'hr', 'picture']],
                    ['mybutton', ['myVideo']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']],
                ],
                buttons: {
                    myVideo: function(context) {
                        var ui = $.summernote.ui;
                        var button = ui.button({
                            contents: '<i class="fab fa-youtube"></i>',
                            tooltip: 'video',
                            click: function() {
                                var div = document.createElement('div');
                                div.classList.add('embed-container');
                                var iframe = document.createElement('iframe');
                                var src = prompt('Enter video url:');
                                src = youtube_parser(src);
                                iframe.src =
                                    `https://www.youtube.com/embed/${src}?autoplay=1&fs=1&iv_load_policy=&showinfo=1&rel=0&cc_load_policy=1&start=0&modestbranding&end=0&controls=1`;
                                iframe.setAttribute('frameborder', 0);
                                iframe.setAttribute('width', '100%');
                                iframe.setAttribute('height', '500px');
                                iframe.setAttribute('type', 'text/html');
                                iframe.setAttribute('allowfullscreen', true);
                                div.appendChild(iframe);
                                context.invoke('editor.insertNode', div);
                            }
                        });
                        return button.render();
                    }
                },
                height: 200,
            });
            // Datatable
            const table_foto = table_html_foto.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                // responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route(h_prefix('foto', $prefix_count)) }}",
                    data: function(d) {
                        d['filter[produk_id]'] = '{{ $produk->id }}';
                    }
                },
                columns: [{
                        data: 'urutan',
                        name: 'urutan',
                    },
                    {
                        data: 'foto_link',
                        name: 'foto_link',
                        render(data, type, full, meta) {
                            return data ? `
                            <img class="table-foto" src="${data}" alt="${full.nama}" onclick="viewImage('${data}', 'Foto icon ${full.nama}')">
                            ` : '';
                        },
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    }, {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_update = `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data" onClick="foto_edit('${data}')">
                                <i class="fas fa-edit"></i> </button>`;
                            const btn_delete = `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="foto_delete('${data}')">
                                <i class="fas fa-trash"></i> </button>`;
                            return btn_update + btn_delete;
                        },
                        orderable: false,
                        className: 'text-nowrap'
                    },
                ],
                order: [
                    [0, 'asc']
                ],
                language: {
                    url: datatable_indonesia_language_url
                }
            });

            const table_marketplace = table_html_marketplace.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                // responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route(h_prefix('prod_mt', $prefix_count)) }}",
                    data: function(d) {
                        d['filter[produk_id]'] = '{{ $produk->id }}';
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    {
                        data: 'jenis_nama',
                        name: 'jenis_nama',
                    },
                    {
                        data: 'link',
                        name: 'link',
                        render(data, type, full, meta) {
                            let jenis = full.jenis_link_produk == null ? full.jenis_link : full
                                .jenis_link_produk;
                            let link = data == null ? (jenis) : data;
                            return `<a target="_blank" href="${link}">Lihat</a>`;
                        },
                        orderable: false
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_update = `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data" onClick="marketplace_edit('${data}')">
                                <i class="fas fa-edit"></i> </button>`;
                            const btn_delete = `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="marketplace_delete('${data}')">
                                <i class="fas fa-trash"></i> </button>`;
                            return btn_update + btn_delete;
                        },
                        orderable: false,
                        className: 'text-nowrap'
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                language: {
                    url: datatable_indonesia_language_url
                }
            });

            table_marketplace.on('draw.dt', function() {
                tooltip_refresh();
                var PageInfo = table_html_marketplace.DataTable().page.info();
                table_marketplace.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });

            // Main form
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[form=MainForm]', 'Simpan');
                $.ajax({
                    type: "POST",
                    url: '{{ $route_save }}',
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
                        if (isEdit) {
                            window.location.reload();
                        } else {
                            window.location.href =
                                `{{ route(h_prefix('update', $prefix_count), $produk->id) }}`;
                        }
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
                        setBtnLoading('button[form=MainForm]',
                            '<li class="fas fa-save mr-1"></li> Simpan',
                            false);
                    },
                    complete: function() {
                        setBtnLoading('button[form=MainForm]',
                            '<li class="fas fa-save mr-1"></li> Simpan',
                            false);
                    }
                });
            });

            // Foto form
            $('#FotoForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[form=FotoForm]', 'Simpan');
                const route = ($('#foto_id').val() == '') ?
                    "{{ route(h_prefix('foto.insert', $prefix_count)) }}" :
                    "{{ route(h_prefix('foto.update', $prefix_count)) }}";
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
                        $("#modal-foto").modal('hide');
                        var oTable = table_html_foto.dataTable();
                        oTable.fnDraw(false);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        isEditFoto = true;
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
                        setBtnLoading('button[form=FotoForm]',
                            '<li class="fas fa-save mr-1"></li> Save changes',
                            false);
                    },
                    complete: function() {
                        setBtnLoading('button[form=FotoForm]',
                            '<li class="fas fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });

            // Marketplace form
            $('#MarketplaceForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('button[form=MarketplaceForm]', 'Simpan');
                const route = ($('#marketplace_id').val() == '') ?
                    "{{ route(h_prefix('prod_mt.insert', $prefix_count)) }}" :
                    "{{ route(h_prefix('prod_mt.update', $prefix_count)) }}";
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
                        $("#modal-marketplace").modal('hide');
                        var oTable = table_html_marketplace.dataTable();
                        oTable.fnDraw(false);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        isEditMarketplace = true;
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
                        setBtnLoading('button[form=MarketplaceForm]',
                            '<li class="fas fa-save mr-1"></li> Save changes',
                            false);
                    },
                    complete: function() {
                        setBtnLoading('button[form=MarketplaceForm]',
                            '<li class="fas fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });
        });

        // foto
        function foto_insert() {
            if (!isEditFoto) return false;
            $('#FotoForm').trigger("reset");
            $('#modal-foto-title').html("Tambah Foto Produk");
            $('#modal-foto').modal('show');
            $('#foto_id').val('');
            $('#foto_foto').val('');
            $('#lihat-foto_foto').hide();
            $('#foto_foto').attr('required', '');
            resetErrorAfterInput();
            isEditFoto = false;
            return true;
        }

        function foto_edit(id) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('foto.find', $prefix_count)) }}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id
                },
                success: (data) => {
                    isEditFoto = true;
                    $('#modal-foto-title').html("Ubah Foto Produk");
                    $('#modal-foto').modal('show');
                    $('#foto_id').val(data.id);
                    $('#foto_nama').val(data.nama);
                    $('#foto_urutan').val(data.urutan);
                    $('#lihat-foto').fadeIn();
                    $('#lihat-foto')
                        .attr('onclick', `viewImage('${data.foto_link}', 'Foto Icon ${data.nama}')`);
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

        function foto_delete(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri('foto', $prefix_count)) }}/${id}`,
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
                                title: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            var oTable = table_html_foto.dataTable();
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
            ele.attr('src', image);
            ele.attr('alt', title);
        };

        // marketplace
        function marketplace_insert() {
            if (!isEditMarketplace) return false;
            $('#MarketplaceForm').trigger("reset");
            $('#modal-marketplace-title').html("Tambah Marketplace Produk");
            $('#modal-marketplace').modal('show');
            $('#marketplace_id').val('');
            $('#marketplace_jenis_id').val('').trigger('change');
            resetErrorAfterInput();
            isEditMarketplace = false;
            return true;
        }

        function marketplace_edit(id) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('prod_mt.find', $prefix_count)) }}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id
                },
                success: (data) => {
                    isEditMarketplace = true;
                    $('#modal-marketplace-title').html("Ubah Marketplace Produk");
                    $('#modal-marketplace').modal('show');
                    $('#marketplace_id').val(data.id);
                    $('#marketplace_link').val(data.link);
                    $('#marketplace_jenis_id').val(data.jenis_id).trigger('change');
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

        function marketplace_delete(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri('prod_mt', $prefix_count)) }}/${id}`,
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
                                title: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            var oTable = table_html_marketplace.dataTable();
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
