<div id="peribadi-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 1 - Butiran Peribadi</h5>
        <small class="text-notice">Sila kemas kini di modul PERIBADI di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="vertical-username">Nama</label>
            <input type="text" id="sect-1-nama" readonly name="nama" class="form-control"  value="{{ $profile['nama'] }}" placeholder="" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">No Kad Pengenalan (Lama)</label>
            <input type="text" id="vertical-email" readonly name="nokp_lama" class="form-control"
            value="{{ empty($profile['nokp_lama']) ? 'TIDAK BERKENAAN' : $profile['nokp_lama'] }}" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">No Kad Pengenalan (Baru)</label>
            <input type="number" id="sect-1-nokp" readonly nama="nokp" class="form-control"
            value="{{ $profile['nokp_baru'] }}" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Jawatan</label>
            <input type="text" id="sect-1-jawatan" readonly name="jawatan" class="form-control" value="{{ $profile['jawatan'] }}"
            placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Gred</label>
            <input type="text" id="sect-1-gred" readonly name="gred" class="form-control" value="{{ $profile['gred'] }}" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Tarikh Lantikan Perkhidmatan (semasa J41)</label>
            <input type="text" id="sect-1-tkh_lantik" readonly name="tkh_lantikan" class="form-control" value="{{ \Carbon\Carbon::parse($profile['tkh_lantikan_j41'])->format('d-m-Y')  }}" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Tarikh disahkan jawatan / naik pangkat terkini</label>
            <input type="text" id="sect-1-tkh_sah" readonly name="tkh_sah" class="form-control" value="{{ \Carbon\Carbon::parse($profile['tkh_sah'])->format('d-m-Y') }}" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Umur Persaraan Wajib</label>
            <input type="number" id="sect-1-bersara" readonly nama="pilihan_bersara_wajib" value="{{ $profile['umur_besara'] }}" class="form-control" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
        </button>
        <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
