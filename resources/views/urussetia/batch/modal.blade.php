<div class="modal fade text-left modal-primary batch-modal" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Kumpulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Nama Kumpulan</label>
                            <input type="text" class="form-control kump-nama" id="basicInput" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-xl-12 col-md-12 col-12">
                        <label for="disabledInput" class="font-weight-bolder"><h4 style="text-decoration: underline;">Carian Pegawai</h4></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Tahun</label>
                            <select class="select2 form-control form-control-lg dropdown-tahun">
                                <option value="">--Sila Pilih--</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->years }}">{{ $year->years }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Gred</label>
                            <select class="select2 form-control form-control-lg dropdown-gred">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Displin</label>
                            <select class="select2 form-control form-control-lg dropdown-jurusan">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                        <button type="button" class="btn btn-success get-carian-staff"><i data-feather='search'></i> Carian</button>
                    </div>
                </div>
                <div class="row table-list">
                    <div class="col-12">
                    <table class="datatables table table-staff">
                        <thead>
                            <tr>
                                <th></th>
                                <th>no. kp</th>
                                <th>nama</th>
                                <th>jawatan</th>
                                {{-- <th>gred</th>
                                    <th>jurusan</th> --}}
                                <th>penempatan</th>
                                <th>tarikh lantikan / naik pangkat</th>
                                <th>kekananan<th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success post-add-batch">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary calon-modal" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Senarai Calon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Nama Kumpulan</label>
                            <input type="text" class="form-control kump-nama-1" id="basicInput" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12 mb-1 search-section">
                        <div class="form-group">
                            <label for="basicInput">Carian Pengguna</label>
                            <select class="calon-carian form-control" id="select2-ajax"></select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">No. KP</label>
                            <input type="text" class="form-control calon-nokp" id="basicInput1" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Nama</label>
                            <input type="text" class="form-control calon-nama" id="basicInput2" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Jawatan</label>
                            <input type="text" class="form-control calon-jawatan" id="basicInput3" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Gred</label>
                            <input type="text" class="form-control calon-gred" id="basicInput4" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Displin</label>
                            <input type="text" class="form-control calon-jurusan" id="basicInput6" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Tarikh Lantikan / Naik Pangkat</label>
                            <input type="text" class="form-control calon-tkh-sah" id="basicInput6" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-12 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Penempatan</label>
                            <input type="text"  class="form-control calon-tempat" id="basicInput5" placeholder="" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div> --}}
                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                        <button type="button" class="btn btn-success tambah-calon"><i data-feather='plus'></i>Tambah</button>
                    </div>
                </div>
                <div class="row table-list">
                    <div class="col-12">
                    <table class="datatables table table-staff2">
                        <thead>
                            <tr>
                                <th>no. kp</th>
                                <th>nama</th>
                                <th>jawatan</th>
                                {{-- <th>gred</th>
                                <th>jurusan</th>--}}
                                <th>penempatan</th>{{--  --}}
                                <th>tarikh lantikan / naik pangkat</th>
                                <th>kekananan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success post-update-batch">Kemaskini</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary status-modal" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Senarai Calon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                                <div class="row table-list">
                    <div class="col-12">
                    <table class="datatables table table-staff-status">
                        <thead>
                            <tr>
                                <th>no. kp</th>
                                <th>nama</th>
                                <th>jawatan</th>
                                {{-- <th>gred</th>
                                <th>jurusan</th> --}}
                                <th>penempatan</th>
                                <th>tarikh lantikan / naik pangkat</th>
                                <th>kekananan</th>
                                <th>Status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                {{-- <button type="button" class="btn btn-success post-update-batch">Kemaskini</button> --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary email-modal" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Hantar Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    {{-- <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Jawatan</label>
                            <select class="select2 form-control form-control-lg dropdown-jawatan">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div> --}}
                    <div class="col-xl-12 col-md-6 col-12 mb-1">

                        <div class="form-group">
                            <label for="basicInput">Pemangkuan Ke Gred</label>
                            <input type="text" class="form-control title-affair" id="basicInput4" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-12 mb-1">

                        <div class="form-group">
                            <label for="basicInput">Pemangkuan Ke Gred</label>
                            <select class="select2 form-control form-control-lg dropdown-gred-2">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Displin</label>
                            <select class="select2 form-control form-control-lg dropdown-jurusan-2">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success post-send-email">Hantar</button>
            </div>
        </div>

    </div>
</div>

<input type="hidden" class="hidden-batch-id" name="batch_id" id="batch_id" />
