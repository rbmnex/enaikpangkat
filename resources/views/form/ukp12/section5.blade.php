<div id="utuh-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Butiran Calon Untuk Tapisan Keutuhan</h5>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="form-label" for="gelaran">Gelaran</label>
            <input type="text" id="gelaran" class="form-control" name="gelaran" value="{{ $profile['gelaran'] }}" placeholder="" />
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="email-id">Nama</label>
            <input type="nama" id="nama" class="form-control" name="nama" value="{{ $profile['nama'] }}" placeholder="" />
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="contact-info">No Kad Pengenalan (Baru)</label>
            <input type="number" id="nokp" class="form-control" name="nokp" value="{{ $profile['nokp_baru'] }}" placeholder="" />
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="contact-info">No Kad Pengenalan (Lama)</label>
            <input type="number" id="nokp" class="form-control" name="nokp_lama" value="{{ $profile['nokp_lama'] }}" placeholder="" />
        </div>
        <div class="form-group col-md-4">
            <label class="form-label" for="jantina">Jantina</label>
            <select class="select2 form-control" id="gender_select" nama="jantina" value="">
                <option value="" selected>-- Sila Pilih --</option>
                <option value="L">Lelaki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label class="form-label" for="bangsa">Bangsa</label>
                <select class="select2 form-control" id="race_select" name="bangsa">
                    <option value="">-- Sila Pilih --</option>
                    @foreach ($race as $bangsa)
                    <option value="{{ $bangsa->kod_bangsa }}" @if($profile['bangsa'] == $bangsa->kod_bangsa)
                        selected
                    @endif>{{ $bangsa->bangsa }}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group col-md-4">
            <label class="form-label" for="bangsa">Agama</label>
                <select class="select2 form-control" id="religious_select" name="agama">
                    <option value="">-- Sila Pilih --</option>
                    @foreach ($religious as $agama)
                    <option value="{{ $agama->kod_agama }}" @if($profile['agama'] == $agama->kod_agama)
                        selected
                    @endif>{{ $agama->agama }}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group col-md6"></div>
        <div class="form-group col-md-6">
            <label class="form-label" for="tkh_lahir">Tarikh Lahir</label>
            <input type="text" class="form-control" id="tkh_lahir" name="tkh_lahir"
            value="{{ $profile['tkh_lahir'] }}" >
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="email-id">Tempat Lahir</label>
            <input type="nama" id="nama" class="form-control" name="tmpt_lahir" value="{{ $profile['tmpt_lahir'] }}" placeholder="" />
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="vertical-email">Jawatan</label>
            <input type="text" id="vertical-email" name="jawatan" value="{{ $profile['jawatan'] }}" class="form-control" placeholder=""  />
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="vertical-email">Gred</label>
            <input type="text" id="vertical-email" name="gred" class="form-control" value="{{ $profile['gred'] }}" placeholder=""  />
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="vertical-email">Gaji Hakiki</label>
            <input type="number" id="vertical-email" name="gaji_hakiki" value="{{ $profile['gaji'] }}" class="form-control" placeholder=""  />
        </div>
        <div class="form-group col-md-6"></div>
        <div class="form-group col-md-12">
            <label class="form-label" for="alamat_bertugas">Alamat Pejabat</label>
            <input type="text" id="alamat_bertugas" class="form-control" name="alamat_pejabat" value="{{ $profile['alamat_pejabat'] }}" placeholder=""/>
        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="alamat_bertugas">Alamat Rumah</label>
            <input type="text" id="alamat_bertugas" class="form-control" value="{{ $profile['alamat_rumah'] }}" name="alamat_rumah" placeholder=""/>
        </div>
        <div class="form-group col-md-6">
           <label class="col-form-label" for="email-id">Nama Pasangan</label>
            <input type="nama" id="nama_pasangan" class="form-control" name="nama_pasangan" placeholder="" />
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="email-id">Jawatan/Pekerjaan Pasangan</label>
             <input type="nama" id="jawatan_pasangan" class="form-control" name="jawatan_pasangan" placeholder="" />
         </div>
         <div class="form-group col-md-12">
            <label class="form-label" for="alamat_bertugas">Alamat Pasangan</label>
            <input type="text" id="alamat_pejabat_pasangan" class="form-control" name="alamat_pejabat_pasangan" placeholder=""/>
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
