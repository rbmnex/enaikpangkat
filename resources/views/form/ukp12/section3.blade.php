<div id="penempatan-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Pengesahan Butiran Perkhidmatan</h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="alamat_bertugas">Alamat Tempat Bertugas</label>
            <input type="text" id="alamat_bertugas" class="form-control" name="alamat_bertugas" value="{{ $profile['alamat_pejabat'] }}" placeholder=""/>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="no_tel_pejabat">No Telefon Pejabat</label>
            <input type="text" id="no_tel_pejabat" class="form-control" name="no_tel_pejabat" value="{{ $profile['tel_pejabat'] }}" placeholder=""/>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="no_faksimili">No Faksimili</label>
            <input type="text" id="no_faksimili" class="form-control" name="no_faksimili" value="{{ $profile['no_faks'] }}" placeholder="No Faksimili"/>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="no_telefon">No Telefon Bimbit</label>
            <input type="text" id="no_telefon" class="form-control" name="no_telefon" value="{{ $profile['no_hp'] }}" placeholder="No Telefon Bimbit"/>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="emel">Emel</label>
            <input type="text" id="emel" class="form-control" name="emel" value="{{ $profile['email'] }}" placeholder="Emel"/>
        </div>

        <div class="col-xl-12 col-md-6 col-12 mb-1 search-section">
            <div class="form-group">
                <label for="basicInput">Carian Kerani Perkhidmatan</label>
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
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
