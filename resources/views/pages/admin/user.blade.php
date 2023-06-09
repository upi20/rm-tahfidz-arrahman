@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $can_excel = auth_can(h_prefix('excel'));
    @endphp
    <!-- Row -->
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">Data {{ $page_attr['title'] }}</h3>
            <div>
                @if ($can_excel)
                    <button class="btn btn-success btn-sm" onclick="exportExcel()">
                        <i class="fas fa-file-excel"></i> Excel
                    </button>
                @endif
                @if ($can_insert)
                    <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default active mb-2">
                    <div class="panel-heading " role="tab" id="headingOne1">
                        <h4 class="panel-title">
                            <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse1"
                                aria-expanded="true" aria-controls="collapse1">
                                Filter Data
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne1">
                        <div class="panel-body">
                            <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="FilterForm">
                                <div class="form-group float-start me-2">
                                    <label for="filter_role">Sebagai</label>
                                    <select class="form-control" id="filter_role" name="filter_role"
                                        style="max-width: 200px">
                                        <option value="">Semua</option>
                                        @foreach ($user_role as $role)
                                            <option value="{{ $role->name }}">
                                                {{ ucfirst(implode(' ', explode('_', $role->name))) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group float-start me-2">
                                    <label for="filter_active">Status Akun</label>
                                    <select class="form-control" id="filter_active" name="filter_active"
                                        style="max-width: 200px">
                                        <option value="">Semua</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </form>
                            <div style="clear: both"></div>
                            <button type="submit" form="FilterForm" class="btn btn-rounded btn-md btn-info"
                                data-toggle="tooltip" title="Refresh Filter Table">
                                <i class="bi bi-arrow-repeat"></i> Terapkan filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>



            <table class="table table-striped" id="tbl_main">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Sebagai</th>
                        <th>Status</th>
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
                    <form action="javascript:void(0)" id="UserForm" name="UserForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama"
                                required="" />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                required="" />
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group ">
                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">Sebagai</label>
                            <select class="form-control select2" multiple style="width: 100%;" required=""
                                id="roles" name="roles[]">
                                @foreach ($user_role as $role)
                                    <option value="{{ $role->name }}">
                                        {{ ucfirst(implode(' ', explode('_', $role->name))) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="active">Status Akun</label>
                            <select class="form-control" style="width: 100%;" required="" id="active"
                                name="active">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="UserForm">
                        <li class="fas fa-save mr-1"></li> Save changes
                    </button>
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
    <script src="{{ asset_admin('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset_admin('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
