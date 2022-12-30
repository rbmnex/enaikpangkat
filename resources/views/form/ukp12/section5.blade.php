<div id="utuh-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 4 -  Butiran Calon Untuk Tapisan Keutuhan</h5>
        <small class="text-notice">Sila kemas kini di modul PERIBADI dan WARIS/ANAK di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="col-form-label" for="gelaran">Gelaran</label>
            <input type="text" readonly id="sect-4-gelaran" class="form-control" name="gelaran" value="{{ $profile['gelaran'] }}" placeholder="" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="email-id">Nama</label>
            <input type="nama" id="sect-4-nama" readonly class="form-control" name="nama" value="{{ $profile['nama'] }}" placeholder="" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="contact-info">No Kad Pengenalan (Baru)</label>
            <input type="text" id="sect-4-nokp" readonly class="form-control" name="nokp_utuh" value="{{ $profile['nokp_baru'] }}" placeholder="" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="contact-info">No Kad Pengenalan (Lama)</label>
            <input type="text" id="sect-4-nokp_lama" readonly class="form-control" name="nokp_lama" value="{{ $profile['nokp_lama'] }}" placeholder="" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-4">
            <label class="col-form-label" for="jantina">Jantina</label>
            {{-- <select class="select2 form-control" id="gender_select" nama="jantina" value="">
                <option value="" selected>-- Sila Pilih --</option>
                <option value="L">Lelaki</option>
                <option value="P">Perempuan</option>
            </select> --}}
            <input type="text" id="sect-4-jantina" readonly class="form-control" name="jantina" value="@if(strtoupper($profile['jantina']) == 'L'){{ 'Lelaki' }}@elseif (strtoupper($profile['jantina']) == 'P'){{ 'Perempuan' }}@endif" placeholder="" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-4">
            <label class="col-form-label" for="bangsa">Bangsa</label>
                {{-- <select class="select2 form-control" id="race_select" name="bangsa">
                    <option value="">-- Sila Pilih --</option>
                    @foreach ($race as $bangsa)
                    <option value="{{ $bangsa->kod_bangsa }}" @if($profile['bangsa'] == $bangsa->kod_bangsa)
                        selected
                    @endif>{{ $bangsa->bangsa }}</option>
                    @endforeach
                </select> --}}
                <input type="text" id="sect-4-bangsa" readonly class="form-control" name="bangsa" value="{{ $profile['bangsa'] }}" placeholder="" />
                <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-4">
            <label class="col-form-label" for="bangsa">Agama</label>
                {{-- <select class="select2 form-control" id="religious_select" name="agama">
                    <option value="">-- Sila Pilih --</option>
                    @foreach ($religious as $agama)
                    <option value="{{ $agama->kod_agama }}" @if($profile['agama'] == $agama->kod_agama)
                        selected
                    @endif>{{ $agama->agama }}</option>
                    @endforeach
                </select> --}}
                <input type="text" id="sect-4-agama" readonly class="form-control" name="bangsa" value="{{ $profile['agama'] }}" placeholder="" />
                <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="tkh_lahir">Tarikh Lahir</label>
            <input type="text" readonly class="form-control" id="sect-4-tkh_lahir" name="tkh_lahir"
            value="{{ \Carbon\Carbon::parse($profile['tkh_lahir'])->format('d-m-Y') }}" >
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="email-id">Tempat Lahir</label>
            <input type="nama" id="sect-4-tmpt_lahir" readonly class="form-control" name="tmpt_lahir" value="{{ $profile['tmpt_lahir'] }}" placeholder="" />
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Jawatan</label>
            <input type="text" id="sect-4-jawatan" readonly name="jawatan" value="{{ $profile['jawatan'] }}" class="form-control" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Gred</label>
            <input type="text" id="sect-4-gred" readonly name="gred" class="form-control" value="{{ $profile['gred'] }}" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="col-form-group col-md-6">
            <label class="col-form-label" for="vertical-email">Gaji Hakiki</label>
            <input type="number" id="sect-4-gaji" readonly name="gaji_hakiki" value="{{ $profile['gaji'] }}" class="form-control" placeholder=""  />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <input type="hidden" id="sect-4-taraf" value="{{ $profile['taraf_perkahwinan'] }}" />
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="alamat_bertugas">Alamat Pejabat</label>
            <textarea row=3 type="text" id="sect-4-alamat_bertugas" readonly class="form-control" name="alamat_pejabat"  placeholder="">{{ strtoupper($profile['alamat_pejabat']) }}</textarea>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="alamat_bertugas">Alamat Rumah</label>
            <textarea row=3 type="text" id="sect-4-alamat_rumah" readonly class="form-control" name="alamat_rumah" placeholder="">{{  strtoupper($profile['alamat_rumah'])  }}</textarea>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
           <label class="col-form-label" for="email-id">Nama Pasangan</label>
            <input type="nama" id="sect-4-nama_pasangan" value="{{ $profile['pasangan'] }}" readonly class="form-control" name="nama_pasangan" placeholder="" />
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="email-id">Jawatan/Pekerjaan Pasangan</label>
             <input type="nama" value="{{ $profile['pekerjaan_pasangan'] }}" id="jawatan_pasangan" readonly class="form-control" name="sect-4-jawatan_pasangan" placeholder="" />
             <div class="invalid-feedback"></div>
         </div>
         <div class="form-group col-md-12">
            <label class="col-form-label" for="alamat_bertugas">Alamat Pejabat Pasangan</label>
            <textarea row=6 readonly id="sect-4-alamat_pejabat_pasangan" class="form-control" name="alamat_pejabat_pasangan" placeholder=""/>@if($profile['taraf_perkahwinan'] == 'KAHWIN') {{ empty($profile['alamat_pasangan']) ? strtoupper($profile['alamat_rumah']) :  strtoupper($profile['alamat_pasangan']) }} @endif</textarea>
            <div class="invalid-feedback"></div>
        </div>
    </div>
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
