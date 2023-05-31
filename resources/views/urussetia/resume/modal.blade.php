<div class="modal fade text-left modal-primary add-batch-modal" id="batch-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                            <label for="basicInput">Nama Kumpulan<span style="color: red;">*</span></label>
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
                    {{--
                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Tahun</label>
                            <select class="select2 form-control form-control-lg dropdown-jawatan">
                                <option value="">--Sila Pilih--</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->years }}">{{ $year->years }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    --}}
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Gred</label>
                            <select class="select2 form-control form-control-lg dropdown-gred">
                                <option value="">--Sila Pilih--</option>

                                @foreach ($gred as $g)
                                <option value="{{ $g->kod_gred }}">{{ $g->kod_gred }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <div class="form-group">
                            <label for="basicInput">Displin</label>
                            <select class="select2 form-control form-control-lg dropdown-jurusan">
                                <option value="">--Sila Pilih--</option>
                                @foreach ($jurusan as $j)
                                <option value="{{ $j->kod_jurusan }}">{{ $j->jurusan }}</option>
                                @endforeach
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
                    <table class="datatables table table-pegawai">
                        <thead>
                            <tr>
                                <th></th>
                                <th>no. kp</th>
                                <th>nama</th>
                                <th>gred</th>
                                <th>jawatan</th>
                                <th>jurusan</th>
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
