<div id="harta-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 3 -Pengisytiharan Harta</h5>
        <small class="text-notice">Sila kemas kini di bahagian PERIBADI di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label" for="tarikhAkhir_harta">Tarikh Akhir Pengisytiharan Harta Terkini:</label>
            <input type="text" readonly class="form-control" value="{{ $profile['tkh_istihar'] }}" id="tarikhAkhir_harta" name="harta_tkh_akhir_pengisytiharan">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            {{-- <form id="upload_harta" width="100%"> --}}
            <label class="col-form-label" for="lampiran_E">Muat Naik Lampiran E</label>
            <input class="form-control upload-harta" type="file" id="lampiran_E" name="harta_surat_kelulusan" />
            {{-- </form> --}}
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic" for=""><b>* Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) yang disahkan perlu disertakan bersama</b></label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic" for=""><b>* Sila pastikan kelulusan Pengisytiharan Harta adalah sah dan tidak melebihi dari lima (5) tahun dari tarikh Pengisytiharan Harta terakhir</b></label>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
