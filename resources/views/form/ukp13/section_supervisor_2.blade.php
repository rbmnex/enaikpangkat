<div id="penyelia-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 13 - Butiran Sasaran Kerja & Prestasi</h5>
        <small class="text-notice"></small>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-kerja" data-toggle="modal" data-target="#modal-kerja"><i data-feather='plus'></i>Tambah</button>
        </div>
        <div class="table-responsive col-md-12">
            <table class="datatables table kerja-table">
                <thead>
                    <th style="text-align: center;">Bil.</th>
                    <th style="text-align: center;">AKTIVITI / PROJEK / KETERANGAN</th>
                    <th style="text-align: center;">PETUNJUK PRESTASI<br/>(Kuantiti / Kualiti / Masa / Kos yang mana berkaitan)</th>
                    <th style="text-align: center;">SASARAN KERJA<br/>(Untuk tempoh penilaian)</th>
                    <th style="text-align: center;">PENCAPAIAN SEBENAR<br/>(Diisi pada akhir tempoh penilaian)</th>
                    <th style="text-align: center;">ULASAN<br/>(Oleh PYD sekiranya berkaitan)</th>
                    <th style="text-align: center;">TINDAKAN</th>
                </thead>
                <tbody id="tbody-kerja">
                    @foreach ($profile['work_list'] as $work)
                    <tr data-work-id="{{ $work->id }}">
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td>{{ $work->aktiviti }}</td>
                        <td><b>{{ $work->jenis_petunjuk }}</b> <br/> {{ $work->petunjuk_prestasi }}</td>
                        <td>{{ $work->sasaran_kerja }}</td>
                        <td>{{ $work->pencapaian_sebenar }}</td>
                        <td>{{ $work->ulasan }}</td>
                        <td><button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-kerja"><i data-feather='trash-2'></i>Hapus</button>;
                            <button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-kerja"><i data-feather='edit-2'></i>Kemaskini</button>;</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <br/>
    <br/>
    <div class="row">
        <div class="col-xl-12 col-md-6 col-12 mb-1 search-section">
            <div class="form-group">
                <label for="basicInput col-form-label">Carian Penyelia</label>
                <select class="penyelia-carian form-control" id="select2-ajax-2"></select>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">No. KP</label>
                <input type="text" class="form-control penyelia-nokp" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">Nama</label>
                <input type="text" class="form-control penyelia-nama" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">Jawatan</label>
                <input type="text" class="form-control penyelia-jawatan" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">Emel</label>
                <input type="text" class="form-control penyelia-email" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">Unit</label>
                <input type="text" class="form-control penyelia-unit" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">Bahagian</label>
                <input type="text" class="form-control pegawai-bahagian" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">Cawangan</label>
                <input type="text" class="form-control penyelia-cawangan" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-xl- col-md-6 col-12 mb-1">
            <div class="form-group">
                <label for="basicInput col-form-label">Pejabat</label>
                <input type="text" class="form-control penyelia-pejabat" id="basicInput" placeholder="" readonly/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
        </button>
        <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
