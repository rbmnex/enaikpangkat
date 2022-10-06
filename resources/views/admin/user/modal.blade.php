<div class="modal fade text-left modal-primary pengguna-modal" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12 mb-1 search-section">
                        <div class="form-group">
                            <label for="basicInput">Carian Pengguna</label>
                            <select class="pengguna-carian form-control" id="select2-ajax"></select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">No. KP</label>
                            <input type="text" class="form-control pengguna-nokp" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Nama</label>
                            <input type="text" class="form-control pengguna-nama" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Jawatan</label>
                            <input type="text" class="form-control pengguna-jawatan" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Emel</label>
                            <input type="text" class="form-control pengguna-email" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Unit</label>
                            <input type="text" class="form-control pengguna-unit" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Bahagian</label>
                            <input type="text" class="form-control pengguna-bahagian" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Cawangan</label>
                            <input type="text" class="form-control pengguna-cawangan" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl- col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Pejabat</label>
                            <input type="text" class="form-control pengguna-pejabat" id="basicInput" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-12 col-md-12 col-12">
                        <label for="disabledInput" class="font-weight-bolder"><h4 style="text-decoration: underline;">Peranan Sistem</h4></label>
                    </div>
                </div>
                <div class="row roles-list">
                    {{-- loop here --}}
                    {{-- @foreach ($roles as $role)
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="roles" class="custom-control-input role-checkbox role-{{ $role->name }}" id="{{ $role->id }}-{{ $role->name }}" data-role-id="{{ $role->id }}" onClick="this.checked=!this.checked;" />
                                <label class="custom-control-label" for="{{ $role->display_name }}">{{ $role->display_name }}</label>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                    {{-- end loop --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success post-add-pengguna">Tambah</button>
            </div>
        </div>
    </div>
</div>



<input type="hidden" class="hidden-user-id" name="user_id" id="user_id" />
<input type="hidden" class="hidden-ops" name="ops" id="ops" />
