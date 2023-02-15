<div id="penyelia-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 13 - Butiran Prestasi Kerja</h5>
        <small class="text-notice"></small>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            {{-- <form id="upload_harta" width="100%"> --}}
            <label class="col-form-label" style="color: red; font-size: 0.857rem; !important; font-style: italic;" for="lampiran_E">* Sila Muat Naik Borang Sasaran Kerja Dan Laporan  Pencapaian</label>

            {{-- </form> --}}
        </div>
        <div class="form-group col-md-12">
            <div class="file btn btn-success ">
                <i data-feather='upload'></i> Muat Naik
                <input class="file-input upload-work" type="file" id="work_doc" name="work_doc" />
            </div>
            <span class="col-form-label work-file">{{ $profile['work_file'] ? $profile['work_file']->filename : '' }}</span>
            <div class="invalid-feedback"></div>
        </div>

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
    </div>
    <div class="d-flex justify-content-between">
        <button  class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
        </button>
        <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
