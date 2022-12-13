<div id="harta-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 3 -Pengisytiharan Harta</h5>
        <small class="text-notice">Sila kemas kini di modul PERIBADI di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="tarikhAkhir_harta">Tarikh Akhir Pengisytiharan Harta Terkini:</label>
            <input type="text" readonly class="form-control @if($profile['istihar_sah']) {{ 'is-invalid' }} @endif" value="{{ $profile['tkh_istihar'] == 0 ? $profile['tkh_istihar'] : \Carbon\Carbon::parse($profile['tkh_istihar'])->format('d-m-Y') }}" id="tarikhAkhir_harta" name="harta_tkh_akhir_pengisytiharan">
            <div class="invalid-feedback" @if($profile['istihar_sah']) {{ 'style="display:block;"' }} @endif>@if($profile['istihar_sah']) {{ 'Sila kemaskini semula Tarikh Akhir Pengisytiharan Harta yang baru' }} @endif</div>

        </div>
        <div class="form-group col-md-12">
            {{-- <form id="upload_harta" width="100%"> --}}
            <label class="col-form-label" style="color: red; font-size: 0.857rem; !important; font-style: italic;" for="lampiran_E">* Sila Muat Naik Lampiran E</label>

            {{-- </form> --}}
        </div>
        <div class="form-group col-md-12">
            <div class="file btn btn-success ">
                <i data-feather='upload'></i> Muat Naik
                <input class="file-input upload-harta" type="file" id="lampiran_E" name="harta_surat_kelulusan" />
            </div>
            <span class="col-form-label harta-file">{{ $profile['file_harta'] }}</span>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic; font-size: 0.857rem; " for=""><b>* Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) yang disahkan perlu disertakan bersama</b></label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic; font-size: 0.857rem; " for=""><b>* Sila pastikan kelulusan Pengisytiharan Harta adalah sah dan tidak melebihi dari lima (5) tahun dari tarikh Pengisytiharan Harta terakhir</b></label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic; font-size: 0.857rem; " for=""><b>* Sila pastikan tempoh sah laku masih berbaki sekurang-kurangnya 8 bulan dari tarikh emel ini</b></label>
        </div>

    </div>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
        </button>
        <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
